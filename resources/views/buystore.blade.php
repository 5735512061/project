@extends('admin/template')
@section('test')
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/image.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">
  <style>
      p.sansserif {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
    }
  </style>
@include('navbar')  
<br><br><br><br><br><br><br><br>
<div class="container">
  <div class="row">
  <form action="{{url('cart')}}/{{$products->id}}" method="post" accept-charset="utf-8">
            {{csrf_field()}}
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                  <div class="boxes">
                    <div class="img-upper">
                       <input type="hidden" value="{{$products->id}}" name="id">         
                       <img src="{{url('uploads/images/vagitable')}}/{{$products->picture}}" class="img-responsive" width="100%"><br>
                        
                    </div>
                      <div class="description">
                          <center><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่ตะกร้า</button></center>
                      </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                <p class="sansserif">รายละเอียดสินค้า</p>
                  <div class="boxes">
                    <div class="img-upper">
                       <input type="hidden" value="{{$products->id}}" name="id">
                       <div><label>สินค้า :</label>
                       {{$products->pro_name}}</div>
                       <div><label>วันที่ผลิต :</label>
                       {{$products->pro_maf_date}}</div>
                       <div><label>วันที่หมดอายุ :</label>
                       {{$products->pro_ex_date}}</div>
                       <div><label>ราคา :</label>
                       {{$products->pro_sale_price}} บาท / {{$products->unit}}</div>
                       <div><label>จำนวนสินค้า :</label>
                       {{$products->pro_amount}} {{$products->unit}}</div>
                    </div>
                  </div>
                </div>

    </form>
    </div>
</div>  

<script src="{{ asset('js/app.js') }}"></script>
@endsection

