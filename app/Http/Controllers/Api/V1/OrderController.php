<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\OrderFilter;
use App\Http\Requests\Api\V1\ReplaceOrderRequest;
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

        $order = Order::create($request->mappedAttributes());
        
        $products = $request->input('data.relationships.products');
        foreach ($products as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity'], 'price' => $product['price']]);
        }
        return response()->json( new OrderResource($order), Response::HTTP_CREATED );
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {
        try {
            $order = Order::findOrFail($order_id);
        } catch (ModelNotFoundException $e) {
            return $this->error( 'Order not found', Response::HTTP_NOT_FOUND );
        }

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
    public function update(UpdateOrderRequest $request, $order_id)
    {
        // PATCH
        try {
            $order = Order::findOrFail($order_id);
        } catch (ModelNotFoundException $e) {
            return $this->error( 'Order not found', [
                'errors' => ['Order does not exist'],
                'status' => Response::HTTP_NOT_FOUND
            ]);
        }

        if ( $order->user_id !== Auth::id() || $order->user_id !== $request->input('data.attributes.user_id') ) {
            return $this->error( 'Unauthorized', Response::HTTP_UNAUTHORIZED );
        }

        $order->update($request->mappedAttributes());
        
        $products = $request->input('data.relationships.products');
        if ( $products ) {
            $order->products()->detach();
            foreach ($products as $product) {
                $order->products()->attach($product['id'], ['quantity' => $product['quantity'], 'price' => $product['price']]);
            }
        }

        return response()->json( new OrderResource($order), Response::HTTP_OK );
    }

    /**
     * Replace the specified resource in storage.
     */
    public function replace(ReplaceOrderRequest $request, $order_id)
    {
        // PUT
        try {
            $order = Order::findOrFail($order_id);
        } catch (ModelNotFoundException $e) {
            return $this->error( 'Order not found', [
                'errors' => ['Order does not exist'],
                'status' => Response::HTTP_NOT_FOUND
            ]);
        }

        if ( $order->user_id !== Auth::id() || $order->user_id !== $request->input('data.attributes.user_id') ) {
            return $this->error( 'Unauthorized', Response::HTTP_UNAUTHORIZED );
        }

        $order->update($request->mappedAttributes());

        $products = $request->input('data.relationships.products');
        $order->products()->detach();
        foreach ($products as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity'], 'price' => $product['price']]);
        }

        return response()->json( new OrderResource($order), Response::HTTP_OK );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order_id)
    {
        try {
            $order = Order::findOrFail($order_id);
            $order->delete();
            return $this->ok( 'Order deleted successfully', [
                'status' => Response::HTTP_OK
            ]);
        } catch (ModelNotFoundException $e) {
            return $this->error( 'Order not found', [
                'errors' => ['Order does not exist'],
                'status' => Response::HTTP_NOT_FOUND
            ]);
        }
    }
}
