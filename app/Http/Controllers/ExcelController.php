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
    private $curr_raw_time;
    private $curr_date;
    private $curr_date_time;
    public function __construct() {
        date_default_timezone_set('Asia/Bangkok');
        $this->curr_raw_time = getdate();
        $this->curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $this->curr_date_time = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'] . ' ' . $this->curr_raw_time['hours'] . ':' . $this->curr_raw_time['minutes'] . ':' . $this->curr_raw_time['seconds'];
    }

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

    public function ExportOutstock()
    {
        $out = array();
        $products = DB::table('products')->where('pro_amount','<', 30)->get();
        foreach ($products as $product) {
            array_push($out, $product);
        }
        Excel::create('outofstock',function($excel) use($products){
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

    public function ExportExp()
    {
        $curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $ages = DB::table('products')->get();
        $expire_count = 0;
        $exp = array();
        foreach ($ages as $product) {
            if ((strtotime($product->pro_ex_date) - strtotime($curr_date)) / (60*60*24) <= 3) array_push($exp, $product);
        }

        Excel::create('Exp',function($excel) use($exp){
            $excel->sheet('products',function($sheet) use($exp){
                foreach($exp as $product) {
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

    public function ExportBalance()
    {
        $product = DB::table('products')->get();
        Excel::create('Balance',function($excel) use($product){
            $excel->sheet('products',function($sheet) use($product){
                foreach($product as $product) {
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
        return redirect('products');
    }
    public function deleteAll()
    {
        DB::table('products')->delete();
        return back();
    }
}
