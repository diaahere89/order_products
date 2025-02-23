<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\OrderFilter;
use App\Http\Requests\Api\V1\StoreOrderRequest;
use App\Http\Requests\Api\V1\UpdateOrderRequest;
use App\Http\Resources\V1\OrderCollection;
use App\Http\Resources\V1\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index( OrderFilter $filter )
    {
        $orders = Order::where('user_id', Auth::id())->filter( $filter )->paginate();
        return response()->json( new OrderCollection($orders), Response::HTTP_OK );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $user = User::findOrFail( $request->input('data.attributes.user_id') );
        } catch (ModelNotFoundException $e) {
            return $this->ok( 'User not found', [
                'errors' => ['The provided user id does not exist'],
                'status' => Response::HTTP_NOT_FOUND
            ]);
        }

        $model = [
            'name' => $request->input('data.attributes.name'),
            'description' => $request->input('data.attributes.description'),
            'status' => $request->input('data.attributes.status'),
            'date' => $request->input('data.attributes.date'),
            'user_id' => $request->input('data.attributes.user_id'),
            'products' => $request->input('data.relationships.products'),
        ];
        $products = $request->input('data.relationships.products');
        
        $order = Order::create($model);
        foreach ($products as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity'], 'price' => $product['price']]);
        }
        return response()->json( new OrderResource($order), Response::HTTP_CREATED );
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
        return $this->error( 'Not implemented', Response::HTTP_NOT_IMPLEMENTED );
    }
}
