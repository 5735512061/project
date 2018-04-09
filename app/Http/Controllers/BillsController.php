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
use App\Order;

class BillsController extends Controller
{
    // public function bill(Request $request){ 
    // 	Cart::create($request->all());
    // 	$cart = Cart::where('user_id',Auth::user()->id)->get();
    //     session(['countCart' => $cart->count()]); 
    //     return view('cart')->with('cart',$cart);
    // }
    public function bill(Request $request)
    {
        // $cart = $request->get('carts');
        $total = 0;
        $id = Order::orderBy('order_id','DESC')->value('order_id');  
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        foreach ($cart as $col) {
            $total += DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price')*$col->amount;
        }
        return view('bill')->with('total',$total)
                           ->with('cart',$cart)
                           ->with('id',$id);
    }

      public function orderhistory(Request $request)
    {
        // $cart = $request->get('carts');
        $total = 0;
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        foreach ($cart as $col) {
            $total += DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price')*$col->amount;
        }
        return view('orderhistory')->with('total',$total)
                                   ->with('cart',$cart);
    }
}
