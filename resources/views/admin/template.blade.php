<!DOCTYPE html>
<html lang="en">
<head>
	
	@include('header')
	<!-- <title> @yield('title')</title> -->
  <title>KASET FARM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="/css/app.css">
  	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/navbar.css">
  	<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome-min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-min.css">

  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<header>
        
    </header>

@section('test')
@show
	<div class="container">
		@section('content')
		@show	
	</div>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>