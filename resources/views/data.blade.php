@extends('admin/template')

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	@include('admin.navbar')
	@include('admin.leftmenu')
	
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <nav class="navbar navbar-default">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="home1">หน้าแรก</a></li>
                            <li><a href="product">คลังสินค้า</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">บทความ</a></li>
                            <li><a href="#">กระดานถาม-ตอบ</a></li>
                        </ul>
                      </div>
                  </nav>

              </div>

                <div class="panel-body">
                   <h4>ข้อมูลส่วนตัว</h4>
                   
                      <div class="panel panel-default">
                        <div class="panel-body"> 
                            <form class="form-horizontal">
                   <div class="z-form-block">
                        <div class="row">
                                <div class="col-md-8" >
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 col-md-3 control-label">ชื่อผู้ใช้งาน</label>
                                        <div class="col-sm-9 col-md-9" >
                                            <input type="text" class="form-control form-text" style="width:65%;" value="{{ Auth::user()->name }} " id="displayname" >
                                            

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 col-md-3 control-label">อีเมล</label>
                                        <div class="col-sm-9 col-md-9" >
                                            <input type="text" class="form-control form-text" style="width:65%;" value="{{ Auth::user()->email }} " id="displayname" placeholder="">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
            </form>
                        </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>   

<!--  -->
    </div>
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
