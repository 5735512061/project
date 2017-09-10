@extends('user/template')
@section('test')
	<meta charset="UTF-8">
    <link href="{{asset('css/bootstrap-tableadmin.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-tableadmin.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link href="{{asset('css/bootstrap-menu.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>    

	<!-- navbar -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				 <a class="navbar-brand">Kaset-Warehouse</a>
			</div>

			<ul class="nav navbar-nav">
                <li><a href="uproduct">สินค้า</a></li>
                <li><a href="uinsert">สินค้าเข้า</a></li>
                <li><a href="uedit">แก้ไขสินค้า</a></li>
                <li class="active"><a href="udelete">สินค้าออก</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="logout.blade.php">
						<span class="glyphicon glyphicon-log-in"></span>  LOGOUT
					</a>
				</li>
			</ul>
		</div>
	</nav>
	
@include('user.leftmenu')
@include('user.import_product')


<!--  -->
    </div>

@endsection