<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // cart List
    public function cartList()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get()->count();
        $cartData = Cart::select('carts.*', 'products.*')
            ->leftJoin('products', 'carts.product_id', 'products.id')
            ->where('user_id', Auth::user()->id)
            ->get();
        $totalPrice = 0;
        foreach ($cartData as $total) {
            $totalPrice += $total->price * $total->count;
        }

        return view('user.home.cart', compact('cart', 'cartData', 'totalPrice'));
    }
}
