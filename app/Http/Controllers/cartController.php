<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\product;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function index(Cart $cart) {
        $cartItems = $cart->listCart();
        //dd($cartItems);
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request, Cart $cart) {
        $product = product::find($request-> id);
        $quantity = $request->quantity;
        $cart->addToCart($product, $quantity);
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }


    public function showQuantity(Cart $cart) {
        return view('partial.header', ['cart' => $cart]);
    }
}
