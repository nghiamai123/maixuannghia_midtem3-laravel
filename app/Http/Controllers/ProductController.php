<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Cart2;
use App\Models\ProductType;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $product1s = Product::where('new', 1)->get();
        return view('homepage', compact('products', 'product1s'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('editCart', ['Id' => $id]);
        // return $id;
    }



    public function getinfoproducts()
    {
        $products = Product::all();
        return view('product_type', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $oldCart = $request->session()->get('cart');
        $cart = $oldCart; // Thay thế YourCartClass bằng tên lớp chứa hàm updateQty
        $cart->updateQty($id, $request->input('qty')); // Gọi hàm updateQty để cập nhật số lượng

        $request->session()->put('cart', $cart);

        return redirect('/cart/shopping-cart')->with('message', 'Quantity updated successfully');
    }

    public function showCheckout(Request $request)
    {
        $cart = Session::get('cart');
        return view('checkout', compact('cart'));
    }

    public function shoppingCard()
    {
        // $cart = Session::get('cart');
        return view('shopping_cart');
    }
}
