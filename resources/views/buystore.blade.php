@extends('admin/template')
@include('navbar')
<link rel="stylesheet" type="text/css" href="css/picture.css">
<br><br>
<div class="container">
  <div class="row" align="center">
  <form  action="/products/{{$product->id}}" method="post" role="form">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                  <div class="boxes">
                    <div class="img-upper">
                      <img src="{{url('uploads/images/vagitable')}}/test2.jpg" class="img-responsive" width="100%"><br>
                    </div>
                      <div class="description">
                          <center><button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่ตะกร้า</button></center>
                      </div>
                  </div>
                </div>
   </form>

    </div>
</div>    

