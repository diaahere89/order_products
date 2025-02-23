<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreOrderRequest;
use App\Http\Requests\Api\V1\UpdateOrderRequest;
use App\Http\Resources\V1\OrderCollection;
use App\Http\Resources\V1\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Traits\V1\ApiResponses;
use Illuminate\Support\Facades\Auth;

class OrderController extends ApiController
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {
        /*
            $query = Order::query()->where('user_id', Auth::id());

            // Search by name or description
            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
                });
            } 

            // Filter by date
            if ($request->has('date')) {
                $query->whereDate('date', $request->input('date'));
            }

            $orders = $query->get()->map(function ($order) {
                $order->products = DB::table('order_product')
                    ->where('order_id', $order->id)
                    ->join('products', 'order_product.product_id', '=', 'products.id')
                    ->select('products.name as name', 'order_product.quantity', 'order_product.price')
                    ->get();
                return $order;
            });
        */

        $orders = $this->includes('user') 
            ? Order::with('products')->with('user')->where('user_id', Auth::id())->paginate()
            : Order::with('products')->where('user_id', Auth::id())->paginate();

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
        } else if ( $this->includes('user') ) {
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
