@extends('admin/template')
@include('navbar')
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/image.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">
  <link rel="stylesheet" type="text/css" href="/css/minus-input.css">
  <link rel="stylesheet" type="text/css" href="/css/bill.css">
<link href="/css/lightbox.css" rel="stylesheet">
<script src="/js/lightbox.js"></script>
<br><br><br><br><br><br><br><br>            
<?php
        $index = 0;
?>
	
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="widget-box">
				<div class="widget-header widget-header-large">
					<h4 class="widget-title grey lighter">
						<i class="glyphicon glyphicon-list-alt"></i>
						บิลสินค้า
					</h4>

					<div class="widget-toolbar no-border invoice-info">
						<span class="invoice-info-label">รหัสบิลสินค้า :</span>
						<span class="blue">
						<?php echo (DB::table('users')->where('id',Auth::user()->id)->value('id'));?></span>
						<br>
						<span class="invoice-info-label">รหัสลูกค้า :</span>
						<span class="blue">
						<?php echo (DB::table('users')->where('id',Auth::user()->id)->value('id'));?>
						</span>
						<br>
						<span class="invoice-info-label">Date :</span>
						<span class="blue">
						<?php echo(date('F d, Y', strtotime(DB::table('carts')->where('user_id',Auth::user()->id)->value('created_at'))));?>
						</span>
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main padding-24">
						<!-- <div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="alert alert-info">
    									<center><strong>ข้อมูลลูกค้า</strong></center>
  									</div>
								</div>

								<div>
									<ul class="list-unstyled spaced">
										<li>
											<i class="ace-icon fa fa-caret-right blue"></i>Street, City
										</li>
										<li class="divider"></li>
										<div class="row">
											<div class="alert alert-success">
    											<center><strong>รายละเอียดการสั่งซื้อ</strong></center>
  											</div>
										</div>
									</ul>
								</div>
							</div>
						</div> -->
						<div class="space"></div>

						<div>

							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th class="center">ลำดับ</th>
										<th>ชื่อสินค้า</th>
										<th class="hidden-xs">จำนวน (หน่วย)</th>
										<th class="hidden-480">ราคา/หน่วย</th>
										<th>ราคารวม (บาท)</th>
									</tr>
								</thead>
							@foreach($cart as $index=>$col)
								<tbody>
									<tr>
										<td class="center">{{$index+1}}</td>
										<td>
											<?php echo (DB::table('products')->where('id',$col->pro_id)->value('pro_name'));?>
										</td>
										<td class="hidden-xs">
											{{$col->amount}} <?php echo (DB::table('products')->where('id',$col->pro_id)->value('unit'));?>
										</td>
										<td class="hidden-480">
											<?php echo (DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price'));?>
										</td>
										<td>
											<?php echo (DB::table('products')->where('id',$col->pro_id)->value('pro_sale_price'))*$col->amount; 
											?>
										</td>
									</tr>
								</tbody>
							@endforeach
							</table>

						</div>
						<div class="hr hr8 hr-double hr-dotted"></div>
						<div class="row">
							<div class="col-sm-5 pull-right">
								<h4 class="pull-right">
									ราคารวมทั้งหมด (บาท) : {{$total}}
									<span class="red"></span>
								</h4>
							</div>
						</div>
						<div class="space-6"></div>
						<div class="well" align="center">
							<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> สั่งซื้อ</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="{{ asset('/js/app.js') }}"></script>

 