<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Member;
use App\Http\Requests\V1\StoreMemberRequest;
use App\Http\Requests\V1\UpdateMemberRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MemberCollection;
use App\Http\Resources\V1\MemberResource;
use Illuminate\Http\Request;
use App\Services\V1\MemberQuery;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // obtain filter
        $filter = new MemberQuery();
        // translate param to related operator
        $queryItems = $filter->transform($request);
        // chain relationship
        $includeShips = $request->query('includeShips');

        $members = Member::where($queryItems);

        if ($includeShips) {
            $members = $members->with('ship');
        }

        return cache()->remember('members', 60*60*12, function() use($members, $request) {
            return new MemberCollection($members->paginate()->appends($request->query()));
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        return new MemberResource(Member::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $includeShips = request()->query('includeShips');

        if ($includeShips) {
            return new MemberResource($member->loadMissing('ship')); 
        }

        return new MemberResource($member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        return $member->update($request->all());
    }
}
