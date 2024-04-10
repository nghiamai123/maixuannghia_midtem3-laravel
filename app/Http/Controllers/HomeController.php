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

    public function deleteCart(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            if (Session::has('cart')) {
                $oldCart = Session('cart') ? Session::get('cart') : null;
                $cart = $oldCart;
                $cart->removeItem($id);
                return redirect('/')->with('message', 'Delete item from your cart successfully');
                // Kiểm tra xem mục đã được xóa thành công hay không
                if ($cart->items && count($cart->items) > 0) {
                    Session::put('cart', $cart);
                    return redirect('/')->with('message', 'Delete item from your cart successfully');
                } else {
                    Session::forget('cart');
                    return redirect('/')->with('error', 'Cannot delete item from your cart successfully');
                }
            } else {
                return redirect('/')->with('error', 'No items in your cart');
            }
        } else {
            return redirect('/')->with('error', 'No items in your cart');
        }
    }
}
