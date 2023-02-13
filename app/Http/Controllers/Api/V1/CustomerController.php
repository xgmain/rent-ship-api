<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use Illuminate\Http\Request;
use App\Services\V1\CustomerQuery;
use App\Http\Resources\V1\CustomerCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         // obtain filter
        $filter = new CustomerQuery();
        // translate param to related operator
        $queryItems = $filter->transform($request);
        // chain relationship
        $includeOrders = $request->query('includeOrders');

        $customers = Customer::where($queryItems);

        if ($includeOrders) {
            $customers = $customers->with('order');
        }

        return cache()->remember('customers', 60*60*12, function($customers, $request) {
            return new CustomerCollection($customers->paginate()->appends($request->query()));
        });
    }
}