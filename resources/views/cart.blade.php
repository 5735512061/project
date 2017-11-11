@extends('admin/template')
@include('navbar')
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/image.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">
  <link rel="stylesheet" type="text/css" href="/css/minus-input.css">


<br><br><br><br><br><br><br><br>            
	<div class="container">
	<div class="row">
	 <?php
        $index = 0;
     ?>
	<strong><h3>Shopping Cart : ตะกร้าสินค้า</h3></strong><hr>
	<table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน (หน่วย)</th>
                <th>ราคา (บาท)</th>
                <th>ราคารวม (บาท)</th>
                <th>ยกเลิก</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$products->pro_name}}</td>
                <td>
    <div class="col-xs-6">
        <div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
    </div>{{$products->unit}}
                </td>
                <td>
                	<div class="col-xs-6">
                		<input class="form-control" value="{{$products->pro_sale_price}}">
                	</div>
                </td>
                <td>
                	<div class="col-xs-6">
                		<input class="form-control" value="">
                	</div>
                </td>
                <form method="POST" action="{{$products->id}}">
                <td>
                	<button  class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to cancel ?')">
                       <span class="glyphicon glyphicon-remove-sign"></span>
                    </button>
                </td>
                </form>
            </tr>
            <tr>
                <th colspan="5"><span class="pull-right">รวม</span></th>
                <th></th>
            </tr>
            <tr>
                <td><a href="{{url('/vegetable')}}" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-hand-left"></span> เพิ่มรายการสินค้า</a></td>
                <td colspan="5"><a href="#" class="pull-right btn btn-success btn-md"><span class="glyphicon glyphicon-hand-right"></span> สั่งซื้อสินค้า</a></td>
            </tr>
        </tbody>
    </table>
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

 