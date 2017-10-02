<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Validator;
use DB;

class ProductsController extends Controller
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

    public function index(Request $request)
    {
        // $products = Product::all();
        // return view('admin.product')->with('products',$products);

            $NUM_PAGE = 10;
            $products = Product::paginate($NUM_PAGE);
            $page = $request->input('page');
            $page = ($page != null)?$page:1;
            return view('admin.product')->with('products',$products)
                                        ->with('page',$page)
                                        ->with('NUM_PAGE',$NUM_PAGE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.in');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Product::create( $request->all());
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('products');
    }

    public function exp(Request $request){
           
        $curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
     
        $ages = DB::table('products')->get();
        $expire_count = 0;
        $exp = array();
        foreach ($ages as $col) {
            if ((strtotime($col->pro_ex_date) - strtotime($curr_date)) / (60*60*24) <= 3) array_push($exp, $col);
        }
        return view('exp')->with('products',$exp);
    }

    public function outofstock(){
        $out = array();
        $amount = DB::table('products')->where('pro_amount', '<', 30)->get();
        foreach ($amount as $item) {
            
            array_push($out, $item);
        }
        
        return View('out_of_stock')->with('products', $out);
    }

    public function bestseller(){
        return view('bestseller');
    }

}
