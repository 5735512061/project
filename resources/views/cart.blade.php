@extends('admin/template')
@include('navbar')
  <meta charset="UTF-8">
  <html lang="{{ config('app.locale') }}">
  <link rel="stylesheet" type="text/css" href="/css/image.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">
<link href="/css/lightbox.css" rel="stylesheet">
<script src="/js/lightbox.js"></script>
<br>          
	<div class="container">
	<div class="row">
	 <?php
        $index = 0;
     ?>
	<strong><h3>Shopping Cart : ตะกร้าสินค้า</h3></strong><hr>
  @if(count($cart)==0)
  <div class="alert alert-danger">
       ยังไม่มีสินค้าในตะกร้า
  </div>
  <a href="{{url('/vegetable')}}" class="btn btn-warning" type="submit" ">เลือกซื้อสินค้า</a>
  @else
  	<table class="table table-striped table-hover table-bordered">
          <thead>
              <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อสินค้า</th>
                  <th>จำนวน (หน่วย)</th>
                  <th>ราคา/หน่วย (บาท)</th>
                  <th>ราคารวม (บาท)</th>
                  <th>ยกเลิก</th>
              </tr>
          </thead>
          @foreach($cart as $index=>$col)
          <tbody>
              <tr>
                  <td>{{$index+1}}</td>
                  <td>
                    <?php echo (DB::table('products')->where('id',$col->pro_id)->value('pro_name'));?>
                  </td>
                  <td>{{$col->amount}} <?php echo (DB::table('products')->where('id',$col->pro_id)->value('unit'));?>
                  </td>
                  <td>
                    <div class="col-xs-6">
                      <input class="form-control"  value="<?php echo (DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price'));?>">
                    </div>
                  </td>
                  <td>
                  	<div class="col-xs-6">
                      <input class="form-control" value="<?php echo (DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price'))*$col->amount; 
                        ?>">
                    </div>
                  </td> 
                  <td>
                    <div class="col-xs-6">
                      <input type="hidden" name="_method" value="Delete">
                        <a href="/cart/{{$col->cart_id}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">
                        <span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                  </td>
              </tr>
              
              @endforeach
              <tr>
                  <th colspan="5"><span class="pull-right">รวมทั้งหมด (บาท)</span></th>
                  <th colspan="5">{{$total}}</th>
              </tr>  

              <tr>
                    <td><a href="{{url('/vegetable')}}" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-hand-left"></span> เพิ่มรายการสินค้า</a></td>
                    <td colspan="5">
                <form action="{{url('/bill')}}" method="post">
           {{ CSRF_FIELD() }}
          @foreach($cart as $index=>$col)
          <input type="hidden" name="carts[ {{$index}} ]" value="{{$col->cart_id}}">
          @endforeach
          <button type="submit" class="pull-right btn btn-success btn-md">
                      <span class="glyphicon glyphicon-hand-right"></span> สั่งซื้อสินค้า
                    </button>
                </form>
          </td>
              </tr>
          </tbody>
      </table>
    @endif
</div>
</div> 

<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/minus-input.js') }}"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
</script>

 