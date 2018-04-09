<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;
use App\Order;
use App\User;
use Session;
use DB;
use Auth;
use Redirect;
use Cookie;


class CartsController extends Controller
{
    private $curr_raw_time;
    private $curr_date; 
    private $curr_date_time;

    private $line_api = "https://notify-api.line.me/api/notify";
    private $access_token = 'IdaeRxktqNWNyFs4UCgL0oKoVKEtILDN26Ry23uv5KE';

    public function __construct() {
        date_default_timezone_set('Asia/Bangkok');
        $this->curr_raw_time = getdate();
        $this->curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $this->curr_date_time = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'] . ' ' . $this->curr_raw_time['hours'] . ':' . $this->curr_raw_time['minutes'] . ':' . $this->curr_raw_time['seconds'];
    }

    public function cart(Request $request){ 
    	Cart::create($request->all());
        $total = 0;
    	$cart = Cart::where('user_id',Auth::user()->id)->get();
        session(['countCart' => $cart->count()]); 
        foreach ($cart as $col) {
            $total += DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price')*$col->amount;
        }
        return view('cart')->with('total',$total)
                           ->with('cart',$cart);
    }
    public function cartget(){ 

        $total = 0;
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        foreach ($cart as $col) {
            $total += DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price')*$col->amount;
        }
        return view('cart')->with('total',$total)
                           ->with('cart',$cart);
    }

    public function destroycart($cart_id)
    {
        $delete = DB::table('carts')->where('cart_id',$cart_id)->delete();
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        session(['countCart' => $cart->count()]); 
        return redirect::back();
    }

    private function checkStock() {
        $out = array();
        $str = "\nสินค้าที่ใกล้หมดคลัง";
        $amount = DB::table('products')->where('pro_amount', '<', 30)->get();
        foreach ($amount as $item) {
          array_push($out, $item);
          $str .= "\n{$item->pro_name} : {$item->pro_amount} {$item->unit}";
        }
        //$str = 'ทดสอบข้อความ';    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
        $image_thumbnail_url = '';  // ขนาดสูงสุด 240×240px JPEG
        $image_fullsize_url = '';  // ขนาดสูงสุด 1024×1024px JPEG
        $sticker_package_id = 1;  // Package ID ของสติกเกอร์
        $sticker_id = 410;    // ID ของสติกเกอร์

        $message_data = array(
         'message' => $str,
         'imageThumbnail' => $image_thumbnail_url,
         'imageFullsize' => $image_fullsize_url,
         //'stickerPackageId' => $sticker_package_id,
         //'stickerId' => ''
        );
        $result = $this->send_notify_message($message_data);
    }

    private function checkExp() {

        $curr_date = $this->curr_raw_time['year'] . '-' . $this->curr_raw_time['mon'] . '-' . $this->curr_raw_time['mday'];
        $ages = DB::table('products')->get();
        $expire_count = 0;
        $exp = array(); 
        $str = "\nสินค้าที่ใกล้หมดอายุ";
        foreach ($ages as $col) {
            if ((strtotime($col->pro_ex_date) - strtotime($curr_date)) / (60*60*24) <= 3){
                 array_push($exp, $col);
                 $str .= "\n{$col->pro_name} : {$col->pro_ex_date}";
              }
        }

        //$str = 'ทดสอบข้อความ';    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
        $image_thumbnail_url = '';  // ขนาดสูงสุด 240×240px JPEG
        $image_fullsize_url = '';  // ขนาดสูงสุด 1024×1024px JPEG
        $sticker_package_id = 1;  // Package ID ของสติกเกอร์
        $sticker_id = 410;    // ID ของสติกเกอร์

        $message_data = array(
         'message' => $str,
         'imageThumbnail' => $image_thumbnail_url,
         'imageFullsize' => $image_fullsize_url,
         //'stickerPackageId' => $sticker_package_id,
         //'stickerId' => ''
        );
        $result = $this->send_notify_message($message_data);
    }

    //$result = send_notify_message($line_api, $access_token, $message_data);
    //print_r($result);

    private function send_notify_message($message_data)
    {
     $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$this->access_token );

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $this->line_api);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     $result = curl_exec($ch);
     // Check Error
     if(curl_error($ch)) {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) ); 
     } else {
      $return_array = json_decode($result, true);
     }
     curl_close($ch);
     return $return_array;
    }

    public function delstore(Request $request)
    {

      $pro_name = $request->get('pro_name');
      for($i=0 ;$i<count($pro_name) ;$i++)
      {
        $id[] = Product::where('pro_name',$pro_name[$i])->value('id');
      }
      $amount = $request->get('amount');
      $unit = $request->get('unit');
      $pro_sale_price = $request->get('pro_sale_price');

      $name = $request->get('name');
      $cart = Cart::where('user_id',Auth::user()->id)->get();
      $user_id = User::where('id',Auth::user()->id)->value('id');

      foreach ($cart as $col) {
      $amount[] = DB::table('carts')->where('pro_id',$col->pro_id)->value('amount');
      }
      for($i=0 ;$i<count($name);$i++){
      $pro_amount[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_amount');
      $id[] = DB::table('products')->where('pro_name',$name[$i])->value('id');
      $pro_type[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_type');
      $subtype[] = DB::table('products')->where('pro_name',$name[$i])->value('subtype');
      $pro_price[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_price');
      $pro_sale_price[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_sale_price');
      $pro_maf_date[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_maf_date');
      $pro_ex_date[] = DB::table('products')->where('pro_name',$name[$i])->value('pro_ex_date');
      $unit[] = DB::table('products')->where('pro_name',$name[$i])->value('unit');
      $picture[] = DB::table('products')->where('pro_name',$name[$i])->value('picture');
      }

      for($i=0 ;$i<count($name);$i++){

        $product = Product::find($id[$i]);
        $product->id = $id[$i];
        $product->pro_name = $name[$i]; 
        $product->pro_type = $pro_type[$i];
        $product->subtype = $subtype[$i];
        $product->pro_price = $pro_price[$i];
        $product->pro_sale_price = $pro_sale_price[$i];
        $product->pro_maf_date =  $pro_maf_date[$i];
        $product->pro_ex_date = $pro_ex_date[$i];     
        $product->pro_amount = $pro_amount[$i]-$amount[$i];
        $product->unit = $unit[$i];
        $product->picture = $picture[$i];
        $product->save();

      }
      for($i=0 ;$i<count($pro_name);$i++)
      {  
        $data = new Order;
        $data->amount = $amount[$i];
        $data->pro_id = $id[$i];
        $data->user_id = $user_id;
        $data->save();
      }
      $this->checkStock();
      $this->checkExp();
        $total = 0;
        $id = Order::orderBy('order_id','DESC')->value('order_id');  
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        foreach ($cart as $col) {
            $total += DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price')*$col->amount;
        }
        $count = count($cart);
     

        // dd($cart);
        return view('/paypal')->with('total',$total)
                              ->with('cart',$cart)
                              ->with('id',$id)
                              ->with('count',$count);
    }
}
