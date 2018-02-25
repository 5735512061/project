<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;
use App\Order;
use App\User;
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
    public function delstore(Request $request)
    {
        $pro_name = $request->get('pro_name');
        for($i=0 ;$i<count($pro_name) ;$i++)
        {
          $id[] = Product::where('pro_name',$pro_name[$i])->value('id');
        }
        $amount = $request->get('amount');
        $unit = $request->get('unit');
        $pro_sale_price = $request->get('pro_sale_price');

        $name = $request->get('name');
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        $user_id = User::where('id',Auth::user()->id)->value('id');

        foreach ($cart as $col) {
        $amount[] = DB::table('carts')->where('pro_id',$col->pro_id)->value('amount');
        }
        for($i=0 ;$i<count($name);$i++){
        $pro_amount[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_amount');
        $id[] = DB::table('products')->where('pro_name',$name[$i])->value('id');
        $pro_type[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_type');
        $subtype[] = DB::table('products')->where('pro_name',$name[$i])->value('subtype');
        $pro_price[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_price');
        $pro_sale_price[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_sale_price');
        $pro_maf_date[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_maf_date');
        $pro_ex_date[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_ex_date');
        $unit[] = DB::table('products')->where('pro_name',$name[$i])->value('unit');
        $picture[] = DB::table('products')->where('pro_name',$name[$i])->value('picture');
        }

        for($i=0 ;$i<count($name);$i++){

          $product = Product::find($id[$i]);
          $product->id = $id[$i];
          $product->pro_name = $name[$i]; 
          $product->pro_type = $pro_type[$i];
          $product->subtype = $subtype[$i];
          $product->pro_price = $pro_price[$i];
          $product->pro_sale_price = $pro_sale_price[$i];
          $product->pro_maf_date =  $pro_maf_date[$i];
          $product->pro_ex_date = $pro_ex_date[$i];     
          $product->pro_amount = $pro_amount[$i]-$amount[$i];
          $product->unit = $unit[$i];
          $product->picture = $picture[$i];
          $product->save();

        }
        for($i=0 ;$i<count($pro_name);$i++)
        {  
          $data = new Order;
          $data->amount = $amount[$i];
          $data->pro_id = $id[$i];
          $data->user_id = $user_id;
          $data->save();
        }
        DB::table('carts')->where('user_id',Auth::user()->id)->delete();
        return view('/success');    

    }

    public function top()
    {
      // $products = Order::all();
      // $products = Order::orderBy('amount','desc')->take(3)->get();
      // return view('bestseller')->with('products',$products);
        $date       = Input::get('keyword') . "%";
        $date_start = substr($date, 0, 8) . "01";
        $date_end   = substr($date, 0, 8) . "31";

        $year = substr($date, 0, 4) . '%';
        $count = 0;
        Session::flash('keyword', Input::get('keyword'));
        Session::flash('range', Input::get('range'));

        if(Input::get('range') == "date"){
            $result = DB::table('orders')
                    ->selectRaw('*, sum(amout) as sum_amount, sum(pro_amount) as sum_proamount, sum(pro_sale_price) as sum_price')
                    ->where('created_at', 'like', $date)
                    ->groupBy('code')
                    ->orderBy('sum_amount', 'desc')
                    ->orderBy('name')
                    ->paginate(25);
        }

        else if(Input::get('range') == "year"){
            $result = DB::table('orders')
                    ->selectRaw('*, sum(amout) as sum_amount, sum(pro_amount) as sum_proamount, sum(pro_sale_price) as sum_price')
                    ->where('created_at', 'LIKE', $year)
                    ->groupBy('code')
                    ->orderBy('sum_amount', 'desc')
                    ->orderBy('name')
                    ->paginate(25);

        }
        else if(Input::get('range') == "month") {
            $result = DB::table('orders')
                    ->selectRaw('*, sum(amout) as sum_amount, sum(pro_amount) as sum_proamount, sum(pro_sale_price) as sum_price')
                    ->whereBetween('created_at', [$date_start, $date_end])
                    ->groupBy('code')
                    ->orderBy('sum_amount', 'desc')
                    ->orderBy('name')
                    ->paginate(25);

        }
         else $result = false;  
         $count = count($result);
        return View('bestseller',compact('result','count'));
    
    }
}
