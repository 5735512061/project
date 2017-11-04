@extends('admin/template')
@section('test')
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/image.css">
    <link rel="stylesheet" type="text/css" href="css/test.css">
@include('navbar')


<br>
<div class="container">
            <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="gallery-title">Vegetable</h1>
            </div>
            <form action="{{url('buystore')}}" method="post" accept-charset="utf-8">
           	{{csrf_field()}}
            @foreach($products as $index => $col)
                <div class="col-md-4">
                    <img src="uploads/images/vagitable/{{$col->picture}}" class="img-responsive" width="50%" height="50%"><br>
                    <input type="hidden" value="10102010" name="id">
                    <button class="btn btn-warning" type="submit">เลือกซื้อ</button>
                </div>
             @endforeach  
             </form> 

             <!-- <form action="{{url('buystore')}}" method="post" accept-charset="utf-8">
             	{{csrf_field()}}
                <div class="col-md-4">
                    <img src="{{url('uploads/images/vagitable')}}/test1.jpg" class="img-responsive" width="50%" height="50%">
                    <input type="hidden" value="10105020" name="id">
                    <button class="btn btn-warning" type="submit">เลือกซื้อ</button>

              </form> -->
                </div>
            </div>
        </div>
     
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@endsection