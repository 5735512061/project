@extends('admin/template')
@section('test')
	<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/image.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">
@include('navbar')  
<br>
<div class="container">
  <div class="row" align="center">

            @foreach($products as $index => $col)
            <form action="{{url('buystore')}}/{{$col->id}}" method="post" accept-charset="utf-8">
           	{{csrf_field()}}
            
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                <div class="thumbnail">
                  <div class="boxes">
                    <div class="img-upper">
                      <input type="hidden" value="{{$col->id}}" name="id">
                      <img src="/uploads/images/vagitable/{{$col->picture}}" class="img-responsive" width="100%"><br>
                    </div>
                      <div class="caption">
                          <label>สินค้า :</label>
                          {{$col->pro_name}}
                          <br><label>ราคา :</label>
                          {{$col->pro_sale_price}} บาท / {{$col->unit}}
                          <p align="center"><button class="btn btn-warning" type="submit" ">เลือกซื้อ</button></p>
                          
                      </div>
                  </div>
                  </div>
                </div>

           
             </form>   
             @endforeach  
    </div>
</div>    

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@endsection
