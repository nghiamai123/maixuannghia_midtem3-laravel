<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart2;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function getSignUp()
    {
        return view('signup');
    }

    public function postSignup(Request $req)
    {
        // dd($req);
        $validator = Validator::make(
            $req->all(),
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'full_name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'repassword' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử  dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'repassword.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự'
            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->full_name = $req->input('full_name');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('password'));
        $user->phone = $req->input('phone');
        $user->address = $req->input('address');
        // $user->level = 2;
        // dd($user);
        $user->save();
        return redirect('/SignIn')->with('success', 'Tạo tài khoản thành công');
    }

    public function checkout()
    {
        $oldCart = Session::get('cart'); //session cart được tạo trong method addToCart của PageController
        // $cart=new Cart2();
        $cart = $oldCart;
        return view("checkout", ['cart' => Session::get('cart'), 'productCarts' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
    }
}
