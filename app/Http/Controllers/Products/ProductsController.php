<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Validator;
use DB;
use Storage;
use putFile;

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

        $categorys = Category::all();
        return view('admin.in')->with('categorys',$categorys);
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

      if($request->hasFile('img')){
            echo 'Uploaded <br>';
            $file = $request->file('img');
             $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('uploads/images/vagitable', $fileName);
            $path = 'uploads/images/vagitable/'.$fileName;

            echo '<a href="'.$path.'" target="_blank">ดาวน์โหลดรูปภาพ</a>';
            $created_product = Product::findOrFail($request->get('id'));
            $created_product->update(array('picture'=>$fileName));
            
        }else
        {
              echo 'Can not Upload';
        }
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

    public function buystore(Request $request){
        // $data = $request->get('id');
        // $products = DB::table('products')
        //         ->where('id', $data)->get();

        // return view('buystore')->with('products',$products);
        $products = Product::findOrFail($id);
        return view('buystore')->with('products',$products);
    }

    public function buygetstore(){    
        return view('product.vegetable');
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
    public function balance(){
        $product = DB::table('products')->get();
        return view('balance')->with('product',$product);
    }
    public function vegetable(){
        $product = DB::table('products')->where('pro_type','=','ผัก')->get();
        return view('product.vegetable')->with('products',$product);
    }
    public function fruit(){
        $product = DB::table('products')->where('pro_type','=','ผลไม้')->get();
        return view('product.fruit')->with('products',$product);
    }
    public function plant(){
        $product = DB::table('products')->where('pro_type','=','พืชไร่')->get();
        return view('product.plant')->with('products',$product);
    }
    public function dried_food(){
        $product = DB::table('products')->where('pro_type','=','ของแห้ง')->get();
        return view('product.dried_food')->with('products',$product);
    }
    public function product_general(){
        $product = DB::table('products')->where('pro_type','=','สินค้าทั่วไป')->get();
        return view('product.product_general')->with('products',$product);
    }

    public function upload(Request $request)
    { 
         if($request->hasFile('img')){
            echo 'Uploaded <br>';
            $file = $request->file('img');
             $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('uploads/images/vagitable', $fileName);
            $path = 'uploads/images/vagitable/'.$fileName;
            echo '<a href="'.$path.'" target="_blank">ดาวน์โหลดรูปภาพ</a>';
        }else
        {
              echo 'Can not Upload';
        }
    }

}
