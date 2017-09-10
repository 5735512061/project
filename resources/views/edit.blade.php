@extends('admin/template')
@section('test')
	@include('admin.navbar')
	@include('admin.leftmenu')
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                          <form  action="/addusers/{{$adduser->id}}" method="post" role="form">
                            <div class="form-group">
                              
                              รหัสผู้ใช้งาน :<input type="text" class="form-control" value="{{$adduser->id}}" id="id" name="id" placeholder="ป้อนรหัสผู้ใช้งาน">
                            </div>
                            <div class="form-group">
                              ชื่อผู้ใช้งาน :<input type="text" class="form-control" value="{{$adduser->username}}" id="username" name="username" placeholder="ป้อนชื่อผู้ใช้งาน">
                            </div>
                            <div class="form-group">
                              สิทธิ์การใช้งาน:<input type="text" class="form-control" id="access" name="access" placeholder="สิทธิ์การใช้งาน" value="{{$adduser->access}}">
                            </div>
                            <div class="form-group">
                              สถานะ:<input type="text" class="form-control" id="status" name="status" placeholder="สถานะ" value="{{$adduser->status}}">
                            </div>
                            <div class="form-group">
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}  
                                <button id="submit" name="submit" class="btn btn-success">อัพเดตผู้ใช้งาน</button>
                            </div> 
                </div>
                         </form>
                        </div>
 

                </div>  
            </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection