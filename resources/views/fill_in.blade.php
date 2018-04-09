@extends('admin/template')
@section('test')
@include('navbar')
<br><br><br><br><br><br><br><br>
<div class="container">
<div class="panel-group">
<div class="panel panel-primary">
  <div class="panel-heading">เพิ่มผู้ใช้งาน</div>
    <div class="panel-body">
      <div class="row">
        <form  action="{{url('/addusers')}}" method="post" role="form">
          <div class="col-md-6">
            <div class="form-group"> 
                รหัสผู้ใช้งาน :<input type="text" class="form-control" id="id" name="id" placeholder="ป้อนรหัสผู้ใช้งาน">
            </div>
            <div class="form-group">
                ชื่อผู้ใช้งาน :<input type="text" class="form-control" id="username" name="username" placeholder="ป้อนชื่อผู้ใช้งาน">
            </div>
          </div>
          <div class="col-md-6">
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
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection