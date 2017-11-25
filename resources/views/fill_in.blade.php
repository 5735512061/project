@extends('admin/template')
@section('test')

	@include('navbar')
	@include('admin.leftmenu')

  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <nav class="navbar navbar-default">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="/home1">หน้าแรก</a></li>
                            @if (!Auth::guest())
                            <li><a href="/product">คลังสินค้า</a></li>
                            @endif
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">บทความ</a></li>
                            <li><a href="#">กระดานถาม-ตอบ</a></li>
                        </ul>
                      </div>
                  </nav>

              </div>

                <div class="panel-body">
                   <div class="container">
            <div class="row">
                <div class="col-sm-4">
                          <form  action="/addusers" method="post" role="form">
                            <div class="form-group">  
                              รหัสผู้ใช้งาน :<input type="text" class="form-control" id="id" name="id" placeholder="ป้อนรหัสผู้ใช้งาน">
                            </div>
                            <div class="form-group">
                              ชื่อผู้ใช้งาน :<input type="text" class="form-control" id="username" name="username" placeholder="ป้อนชื่อผู้ใช้งาน">
                            </div>
                            <div class="form-group">
                              สิทธิ์การใช้งาน:<input type="text" class="form-control" id="access" name="access" placeholder="สิทธิ์การใช้งาน">
                            </div>
                            <div class="form-group">
                              สถานะ:<input type="text" class="form-control" id="status" name="status" placeholder="สถานะ">
                            </div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button id="submit" name="submit" class="btn btn-success">เพิ่มผู้ใช้งาน</button>
                            </div>
                </div>         
                          </form>
                        </div>


                </div>  
            </div>
        </div>
<!--  -->
    </div>

            </div>
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection