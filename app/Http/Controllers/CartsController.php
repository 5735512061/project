<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;
use Session;
use DB;
use Auth;
use Redirect;
use Cookie;

class CartsController extends Controller
{
    public function cart(Request $request){ 
    	Cart::create($request->all());
    	$cart = Cart::where('user_id',Auth::user()->id)->get();
        session(['countCart' => $cart->count()]); 
        
        return view('cart')->with('cart',$cart);
    }
    public function cartget(){   

    	$cart = Cart::where('user_id',Auth::user()->id)->get();
        return view('cart')->with('cart',$cart);
    }
    public function destroycart($cart_id)
    {
        // Cart::destroy($cart_id);
        // return redirect('/cart');
        $delete = DB::table('carts')->where('cart_id',$cart_id)->delete();
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        session(['countCart' => $cart->count()]); 
        return redirect::back();
    }
    // public function getAddToCart(Request $request , $id){
    // 	$products = Product::findOrFail($id);
    // 	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    // 	$cart = new Cart($oldCart);
    // 	$cart->add($carts, $product->id);

    // 	$request->session()->put('cart',$cart);
    // 	dd($request->session()->get('cart'));
    // 	return redirect()->route('cart');
    // } 

    public function bill(Request $request)
    {
        // $cart = $request->get('carts');
        $cart = DB::table('carts')->get();
        return view('bill')->with('cart',$cart);
    }

}
