<?php

namespace App\Http\Controllers\frontEnd\global;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class cartImplementsGolobal implements cartGolobal
{
    public function cartGolobal()
    {
        $cartItems = collect(Session::get('cart', []))->where('users_id', Auth::id())->toArray();
        $productIds = array_keys($cartItems);
        $products = Product::whereIn('id', $productIds)->get();
        $data = ['cart' => $cartItems,  "product_id_all" => $products];
        return    $data  ;
    }
}
