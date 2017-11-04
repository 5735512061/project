@extends('admin/template')
@include('navbar')

<div class="container-fluid">
    <section class="container">
		<div class="container-page">				
			<div class="col-md-4">
				<h3 class="dark-grey">กุ้ยช่ายขาว</h3>
				<img src="{{url('uploads/images/vagitable')}}/test2.jpg" class="img-responsive" width="50%" height="50%"><br>
				<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่ตะกร้า</button>
			</div>
			<div class="col-md-4">

				<h3 class="dark-grey">รายละเอียดสินค้า</h3>
		@foreach ($products as $object)			
				<div class="form-group col-lg-12">
					<label>รหัสสินค้า</label>
					{{ $object->id }}
				</div>
				
				<div class="form-group col-lg-12">
					<label>ชื่อสินค้า</label>
					{{ $object->pro_name }}
				</div>
				
				<div class="form-group col-lg-12">
					<label>ประเภทสินค้า</label>
					{{ $object->pro_type }}
				</div>			
				<div class="form-group col-lg-12">
					<label>ราคาขาย</label>
					{{ $object->pro_sale_price }} บาท
				</div>	
			
		@endforeach
			</div>
		</div>
	</section>
</div>