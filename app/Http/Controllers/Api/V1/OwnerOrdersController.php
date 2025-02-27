<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\OrderFilter;
use App\Http\Resources\V1\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OwnerOrdersController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index( $ownerId, OrderFilter $filter )
    {
        return response()->json( new OrderCollection(
            Order::where('user_id', $ownerId)->filter( $filter )->paginate()
        ), Response::HTTP_OK );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
