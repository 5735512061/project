<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;
use App\Order;
use Session;
use DB;
use Auth;
use Redirect;
use Cookie;

class CartsController extends Controller
{
    public function cart(Request $request){ 
    	Cart::create($request->all());
        $total = 0;
    	$cart = Cart::where('user_id',Auth::user()->id)->get();
        session(['countCart' => $cart->count()]); 
        foreach ($cart as $col) {
            $total += DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price')*$col->amount;
        }
        return view('cart')->with('total',$total)
                           ->with('cart',$cart);
    }
    public function cartget(){ 

        $total = 0;
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        foreach ($cart as $col) {
            $total += DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price')*$col->amount;
        }
        return view('cart')->with('total',$total)
                           ->with('cart',$cart);
    }
    public function destroycart($cart_id)
    {

        $delete = DB::table('carts')->where('cart_id',$cart_id)->delete();
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        session(['countCart' => $cart->count()]); 
        return redirect::back();
    }
}
