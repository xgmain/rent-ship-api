<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Ship;
use App\Models\Asset;
use App\Http\Requests\V1\StoreShipRequest;
use App\Http\Requests\V1\UpdateShipRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ShipCollection;
use Illuminate\Http\Request;
use App\Services\V1\ShipQuery;
use App\Http\Resources\V1\ShipResource;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // obtain filter
        $filter = new ShipQuery();
        // translate param to related operator
        $queryItems = $filter->transform($request);
         // chain relationship
        $includeAssets = $request->query('includeAssets');
        $includeRoasts = $request->query('includeRoasts');

        $ships = Ship::where($queryItems);

        if ($includeAssets) {
            $ships = $ships->with('asset');
        }

        if ($includeRoasts) {
            $ships = $ships->with('roast');
        }

        return new ShipCollection($ships->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\V1\StoreShipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShipRequest $request)
    {
        $ship = Ship::create($request->all());

        $assets = [];
        foreach ($request->assets as $asset) {
            $assets[] = new Asset($asset);
        }

        $ship->asset()->saveMany($assets);

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ship  $ship
     * @return \Illuminate\Http\Response
     */
    public function show(Ship $ship)
    {
        $includeAssets = request()->query('includeAssets');

        if ($includeAssets) {
            return new ShipResource($ship->loadMissing('asset')); 
        }

        return new ShipResource($ship);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShipRequest  $request
     * @param  \App\Models\Ship  $ship
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShipRequest $request, Ship $ship)
    {
        return $ship->update($request->all());
    }
}
