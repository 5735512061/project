<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use App\Product;
use Input;
use DB;

class ExcelController extends Controller
{
    public function ExportProducts()
    {
    	$products = Product::all();
    	Excel::create('products',function($excel) use($products){
    		$excel->sheet('products',function($sheet) use($products){
                foreach($products as $product) {
                 $data[] = array(
                    $product->id,
                    $product->pro_name,
                    $product->pro_type,
                    $product->subtype,
                    $product->pro_price,
                    $product->pro_sale_price,
                    $product->pro_maf_date,
                    $product->pro_ex_date,
                    $product->pro_amount,
                    $product->unit,
                );
            }
    			$sheet->fromArray($data);
    		});
    	})->export('xlsx');

    }

    public function ImportProducts()
    {
    	return view('ImportProducts');
    }
    public function postImport()
    {
    	Excel::load(Input::file('products'),function($reader){
    		$reader->each(function($sheet){
    			Product::firstOrCreate($sheet->toArray());
    		});
    	});
        return back();
    }
    public function deleteAll()
    {
        DB::table('products')->delete();
        return back();
    }
}
