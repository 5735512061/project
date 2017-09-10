<!DOCTYPE html>
<html lang="en">
<head>
	
	@include('header')
	<title> @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="/css/app.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="{{asset('css/bootstrap-menu.css')}}" rel="stylesheet">
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

  	<style>
  		body{
  			background-image: url("img/bgc.jpg");
  			background-size: cover;
  		}
  	</style>
</head>
<body>

	<div class="container">
		@section('content')
		@show	
	</div>
	
</body>
</html>