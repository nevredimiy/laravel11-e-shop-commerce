<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        Cart::store('cart');
        return view('cart.cart', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->id);
        // $price = $product->sale_price ? : $product->regular_price;  // Задел на будущее
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity, $product->price, ['image' => $product->image])->associate('App\Models\Product');
        return redirect()->back()->with('status', 'Success! Item has been added successfully!');
    }

    public function destroy(Request $request)
    {
        if($request->rowId){
            Cart::instance('cart')->remove($request->rowId);
        }
        // return redirect()->back()->with('status', 'Item was removed!');
    }   
}
