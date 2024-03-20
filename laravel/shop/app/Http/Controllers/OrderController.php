<?php

namespace App\Http\Controllers;

use App\CartProduct;
use App\Order;
use App\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_price = 0;
        $product_controller = new ProductController();
        $order = Order::create([
            'phone_number' => $request->phone_number,
        ]);
        $products = Product::whereIn(
            'id',
            $product_controller->filter_session($request, 'cart')
        )->get();
        foreach ($products as $product) {
            $product_value = $product->id;
            $cart_product = CartProduct::create(
                [
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => $request->$product_value,
                    'price' => $product->price
                ]
            );
            $total_price += $product->price * $request->$product_value;
            $request->session()->forget('cart' . $product->id);
        }
        $order->total_price = $total_price;
        $order->save();

        return redirect()->route('home_page');
    }
}
