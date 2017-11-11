<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;

class CartsController extends Controller
{
    public function cart(Request $request , $id){ 
    	$products = Product::findOrFail($id);
        return view('cart')->with('products',$products);
    }
    public function cartget(){    
        return view('cart');
    }

}
