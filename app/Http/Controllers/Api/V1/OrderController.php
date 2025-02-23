<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\OrderFilter;
use App\Http\Requests\Api\V1\StoreOrderRequest;
use App\Http\Requests\Api\V1\UpdateOrderRequest;
use App\Http\Resources\V1\OrderCollection;
use App\Http\Resources\V1\OrderResource;
use App\Models\Order;
use Illuminate\Http\Response;
use App\Traits\V1\ApiResponses;
use Illuminate\Support\Facades\Auth;

class OrderController extends ApiController
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index( OrderFilter $filter )
    {
        //$orders = Order::where('user_id', Auth::id())->filter( $filter )->paginate();
        $orders = Order::filter( $filter )->paginate();
        return response()->json( new OrderCollection($orders), Response::HTTP_OK );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

        if ($order->user_id !== Auth::id()) {
            return $this->error( 'Unauthorized', Response::HTTP_UNAUTHORIZED );
        } else if ( $this->include('user') ) {
            $order->load('user');
        }
        
        $order->load('products');

        return response()->json( new OrderResource($order), Response::HTTP_OK );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
