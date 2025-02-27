<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\OrderFilter;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

class OrderOwnerController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function orders( OrderFilter $filter )
    {
        //$orders = Order::filter( $filter )->paginate();
        return response()->json( new UserResource(User::with('orders')), Response::HTTP_OK );
    }


    /**
     * Display the specified resource.
     */
    public function show(User $owner)
    {
        if ( $this->include('orders') ) {
            return response()->json( new UserResource($owner->load('orders')), Response::HTTP_OK );
        }
        return response()->json( new UserResource($owner), Response::HTTP_OK );
    }

}
