@extends('admin/template')
@section('test')
	<meta charset="UTF-8">

@include('navbar')<br><br><br><br><br><br><br><br>


@include('admin.import_product')

	<!-- Scripts -->
	    <script src="{{ asset('/js/app.js') }}"></script>
@endsection