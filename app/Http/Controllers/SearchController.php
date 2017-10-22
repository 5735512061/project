<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    public function search2(Request $request)
	 {
		$products = DB::table('products')->distinct()->select('id')->get();
	 	foreach($products as $value) {
	 	$ids[] = $value->id;
	 }
	 	return view('navbar')->with(['products' => json_encode($ids)]);
	 }
}
