@extends('admin/template')
@include('navbar')
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/image.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">
  <link rel="stylesheet" type="text/css" href="/css/minus-input.css">
<link href="/css/lightbox.css" rel="stylesheet">
<script src="/js/lightbox.js"></script>
<br><br><br><br><br><br><br><br>            
<div class="container">
<div class="row">
	<strong><h3>สรุปยอดสินค้า</h3></strong><hr>
        @foreach($cart as $index=>$col)

                  <?php echo (DB::table('products')->where('id',$col->pro_id)->value('pro_name'));?>
                
        @endforeach

</div>
</div> 

<script src="{{ asset('/js/app.js') }}"></script>

 