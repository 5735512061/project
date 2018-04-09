@extends('admin/template')
@include('navbar')
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/image.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">
  <link rel="stylesheet" type="text/css" href="/css/minus-input.css">
  <link rel="stylesheet" type="text/css" href="/css/bill.css">
<link href="/css/lightbox.css" rel="stylesheet">
<script src="/js/lightbox.js"></script>
<br>           
<?php
        $index = 0;
?>
	
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<body OnLoad="document.form1.submit();">

<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="widget-box">
				<div class="widget-header widget-header-large">
					<h4 class="widget-title grey lighter">
						ชำระเงินด้วย Paypal
					</h4>
				</div>
			{{ CSRF_FIELD() }}
				<div class="widget-body">
					<div class="widget-main padding-24">
						<div class="space"></div>
						<table class="table table-striped table-hover table-bordered">
								<thead>
      								<tr>
          								<th>รายการ</th>
          								<th>จำนวน</th>
      								</tr>
          						</thead>
								<tbody>
									<tr>
										<td>รายการสินค้า</td>
										<td>{{$count}}   รายการ</td>
									</tr>
									<tr>
										<td>ยอดเงินที่ต้องชำระ</td>	
										<td>{{$total}}   บาท</td>
									</tr>
								</tbody>
							</table>
						<br><br><div class="well" align="center">
						<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" enctype="multipart/form-data">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="currency_code" value="THB">
							<input type="hidden" name="business" value="kasetfarm@gmail.com">
							<input type="hidden" name="item_name_1" value="Total">
							<input type="hidden" name="amount_1" value="{{$total}}">
							<input type="hidden" name="return" value="DOMAIN/success.php">
							<input type="hidden" name="cencel_return" value="DOMAIN/cancel.php"> 
							<button class="btn btn-info"><span class="glyphicon glyphicon-bitcoin"></span> Paypal</button>
						</form> -->

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div id="paypal-button-container"></div>
<script>

    paypal.Button.render({
        env: 'sandbox', 

        style: {
            label: 'checkout',
            size:  'small',    // small | medium | large | responsive
            shape: 'pill',     // pill | rect
            color: 'gold'      // gold | blue | silver | black
        },

        client: {
            sandbox:'AdVxcdxJRqgwNcNXA8fazb61i2QOqAb_uoiYMxbn_e0o0RiMggeqae2WCke52jVhMyMpjsBUDTAWk2lJ',
        },
        commit: true,
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: {{$total}}, currency: 'THB' }
                        }
                    ]
                }
            });
        },
 onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');  
               	window.location.href = "/success";
            });
            
        }

    }, '#paypal-button-container');

</script>
    
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="{{ asset('/js/app.js') }}"></script>
