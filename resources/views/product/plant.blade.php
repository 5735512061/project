@extends('admin/template')
@section('test')
	<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/image.css">
  <link rel="stylesheet" type="text/css" href="css/picture.css">
@include('navbar')  
<br><br><br><br><br><br><br><br>
<div class="container">
  <div class="row" align="center">
            <form action="{{url('buystore')}}" method="post" accept-charset="utf-8">
            {{csrf_field()}}
            @foreach($products as $index => $col)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                  <div class="boxes">
                    <div class="img-upper">
                      <img src="uploads/images/vagitable/{{$col->picture}}" class="img-responsive" width="100%"><br>
                    </div>
                      <div class="description">
                          <button class="btn btn-warning" type="submit">เลือกซื้อ</button>
                      </div>
                  </div>
                </div>

             @endforeach  
             </form> 
    </div>
</div>    

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@endsection