<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use PDF;
class PDFController extends Controller
{
	public function pdf()
	{
      $products = Product::all();
      $pdf = PDF::loadView('pdf',['products' => $products]);
      return @$pdf->stream();
    }
}