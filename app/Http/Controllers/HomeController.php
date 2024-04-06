<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart2;
use App\Models\ProductType;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function getProductType($id)
    {
        $producttype = ProductType::find($id);
        return view('product_type', compact('producttype'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        if (!is_null($oldCart)) {
            $cart = $oldCart;
        } else {
            $cart = new Cart2();
        }
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
}