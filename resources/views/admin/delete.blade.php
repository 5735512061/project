@extends('admin/template')
@section('test')
	<meta charset="UTF-8">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				 <a class="navbar-brand">Kaset-Warehouse</a>
			</div>

			<ul class="nav navbar-nav">
                <li><a href="product">สินค้า</a></li>
                <li><a href="insert">สินค้าเข้า</a></li>
                <li><a href="edit">แก้ไขสินค้า</a></li>
                <li class="active"><a href="delete">สินค้าออก</a></li>
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
@include('admin.leftmenu')
@include('admin.import_product')


<!--  -->
    </div>

@endsection