<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Validator;
use DB;
use Storage;
use putFile;
use Auth;


class SearchsController extends Controller
{
    public function search (request $request)
    {
        
        if(!Auth::guest()&&Auth::user()->name=="หทัยชนก อินทนิน")
        {
        $name = $request->get('name');
        $NUM_PAGE = 10;
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $product = Product::Where('pro_name','like','%'.$name.'%')->paginate($NUM_PAGE);
        return view('admin.product')->with('products',$product)
                                    ->with('page',$page)
                                    ->with('NUM_PAGE',$NUM_PAGE);
        }
        else
        {
        $name = $request->get('name');
        $product = Product::Where('pro_name','like','%'.$name.'%')->get();
        return view('product.vegetable')->with('products',$product); 

        }
    }
}
