<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

use Redirect;
use Auth;
use Validator;
use DB;
use Session;
use Input;

class ActsController extends Controller
{

   
    public function act(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->pro_amount += $request->amount;
        $product->save();
        return redirect('product');
    }

}
