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
use Auth;

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
        
        
      
       $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if($validator->passes()) {
            $id = $request->get('id');
            $pro_name = $request->get('pro_name');
            $pro_type = $request->get('pro_type');
            $subtype = $request->get('subtype');
            $pro_price = $request->get('pro_price');
            $pro_sale_price = $request->get('pro_sale_price');
            $pro_maf_date = $request->get('pro_maf_date');
            $pro_ex_date = $request->get('pro_ex_date');
            $pro_amount = $request->get('pro_amount');
            $unit = $request->get('unit');
            $txt1 = $request->get('txt1');
            
            if($txt1 != null)
              {
                DB::table('products')->insert(['id'=>$id, 'pro_name'=>$pro_name, 'pro_type'=>$pro_type, 'subtype'=>$subtype, 'pro_price'=>$pro_price,'pro_sale_price'=>$pro_sale_price,'pro_maf_date'=>$pro_maf_date, 'pro_ex_date'=>$pro_ex_date, 'pro_amount'=>$pro_amount, 'unit'=>$txt1]);
              }
              elseif($txt1 == null)
              {
                DB::table('products')->insert(['id'=>$id, 'pro_name'=>$pro_name, 'pro_type'=>$pro_type, 'subtype'=>$subtype, 'pro_price'=>$pro_price,'pro_sale_price'=>$pro_sale_price,'pro_maf_date'=>$pro_maf_date, 'pro_ex_date'=>$pro_ex_date, 'pro_amount'=>$pro_amount, 'unit'=>$unit]);
              }
            if($request->hasFile('img')){

            
                $file = $request->file('img');
                $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
                $file->move('uploads/images/vagitable', $fileName);
                $path = 'uploads/images/vagitable/'.$fileName;
                
                $created_product = Product::findOrFail($request->get('id'));
                $created_product->update(array('picture'=>$fileName));
            }
            

            return redirect('/products');
            // return view('in')->with('id',$request->id)
            //                  ->with('pro_name',$request->pro_name)
            //                  ->with('pro_type',$request->pro_type)
            //                  ->with('subtype',$request->subtype)
            //                  ->with('pro_price',$request->pro_price)
            //                  ->with('pro_sale_price',$request->pro_sale_price)
            //                  ->with('pro_maf_date',$request->pro_maf_date)
            //                  ->with('pro_ex_date',$request->pro_ex_date)
            //                  ->with('pro_amount',$request->pro_amount)
            //                  ->with('unit',$request->unit)
            //                  ->with('img',$request->img);
        }
        else{
            
            return redirect('products/create')->withErrors($validator)->withInput();
        }
    }

    
    
    

    public function rules() 
    {
        return [
            'id' => 'required',
            'pro_name' => 'required',
            'pro_type' => 'required',
            'subtype' => 'required',
            'pro_price' => 'required',
            'pro_sale_price' => 'required',
            'pro_maf_date' => 'required',
            'pro_ex_date' => 'required',
            'pro_amount' => 'required',
            'unit' => 'required',
            'img' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'กรุณาป้อนรหัสสินค้าด้วยค่ะ',
            'pro_name.required' => 'กรุณาป้อนชื่อสินค้าด้วยค่ะ',
            'pro_type.required' => 'กรุณาเลือกประเภทสินค้าด้วยค่ะ',
            'subtype.required' => 'กรุณาเลือกประเภทย่อยของสินค้าด้วยค่ะ',
            'pro_price.required' => 'กรุณาป้อนราคาสินค้าด้วยค่ะ',
            'pro_sale_price.required' => 'กรุณาป้อนราคาขายสินค้าด้วยค่ะ',
            'pro_maf_date.required' => 'กรุณาป้อนวันผลิตด้วยค่ะ',
            'pro_ex_date.required' => 'กรุณาป้อนวันหมดอายุด้วยค่ะ',
            'pro_amount.required' => 'กรุณาป้อนจำนวนสินค้าด้วยค่ะ',
            'unit.required' => 'กรุณาเลือกหน่วยสินค้าด้วยค่ะ',
            'img.required' => 'กรุณาเลือกไฟล์รูปภาพด้วยค่ะ',
        ];
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

    public function buystore(Request $request , $id){
        $products = Product::findOrFail($id);
        $pp = DB::table('products')->where('id',$id)->get();
       // $cc = $request->get('picture')
         //dd($pp[0]->picture);
        return view('buystore')->with('products',$products)
                              ->with('pp',$pp);
    }

    public function buygetstore(){    
        return view('product.vegetable');
    }
    public function exp(Request $request){
        $NUM_PAGE = 10;   
        $curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $ages = DB::table('products')->paginate($NUM_PAGE);
        $expire_count = 0;
        $exp = array();
        foreach ($ages as $col) {
            if ((strtotime($col->pro_ex_date) - strtotime($curr_date)) / (60*60*24) <= 3) array_push($exp, $col);
        }
        return view('exp')->with('products',$ages)
                          ->with('page',$page)
                          ->with('NUM_PAGE',$NUM_PAGE);
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
        $seller = array();
        $amount = DB::table('products')->where('pro_amount', '<', 15)->get();
        foreach ($amount as $item) {
            
            array_push($seller, $item);
        }
        
        return view('bestseller')->with('products',$seller);
    }
    public function balance(Request $request){
        $NUM_PAGE = 10;
        $product = Product::paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('balance')->with('product',$product)
                              ->with('page',$page)
                              ->with('NUM_PAGE',$NUM_PAGE);
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

    public function delete(Request $request)
    {
            $NUM_PAGE = 10;
            $products = Product::paginate($NUM_PAGE);
            $page = $request->input('page');
            $page = ($page != null)?$page:1;
            $products->setPath('delete');
            return view('admin.product')->with('products',$products)
                                        ->with('page',$page)
                                        ->with('NUM_PAGE',$NUM_PAGE)
                                        ->with('delete', 1);
                                    
    }
    public function deleteall(Request $request)
    {

        foreach($request->get('checkbox') as $checkbox)
        {
            Product::destroy($checkbox);
        }
            return redirect('/products');
                                    
    }
    public function postDelete(Request $request)
    {
        $checkbox = $request->get('checkbox');
        $count = count($checkbox);
        for ($i = 0; $i < $count; $i++) {
            $id = (int)$checkbox[$i];
            // Parse your value to integer
            Product::destroy($id);
        }
        return Redirect::back();
    }

}


