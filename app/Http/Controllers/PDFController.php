<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use PDF;
use DB;
class PDFController extends Controller
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


	public function pdf()
	{
      $products = Product::all();
      $pdf = PDF::loadView('pdf',['products' => $products]);
      return @$pdf->stream();
    }
    public function outstockpdf()
	{
	  $out = array();
      $products = DB::table('products')->where('pro_amount','<', 30)->get();
      foreach ($products as $col) {
      	array_push($out, $col);
      }
      $pdf = PDF::loadView('outstockpdf',['products' => $products]);
      return @$pdf->stream();
    }

    public function exppdf()
    {
    	$curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $ages = DB::table('products')->get();
        $expire_count = 0;
        $exp = array();
        foreach ($ages as $col) {
            if ((strtotime($col->pro_ex_date) - strtotime($curr_date)) / (60*60*24) <= 3) array_push($exp, $col);
        }
        $pdf = PDF::loadView('exppdf',['products' => $ages]);
        return @$pdf->stream();
    }

    public function balancepdf()
    {
    	$product = DB::table('products')->get();
        $pdf = PDF::loadView('balancepdf',['products' => $product]);
        return @$pdf->stream();
    }
}
