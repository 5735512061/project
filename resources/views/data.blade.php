@extends('admin/template')
	<meta charset="UTF-8">
	@include('navbar')
<br>
    <div class="container">
    <div class="row">
    <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">ข้อมูลส่วนตัว</div>
      <div class="panel-body">
        <div class="col-md-8">
            <div class="form-group">
                <label for="" class="col-sm-3 col-md-3 control-label">ชื่อผู้ใช้งาน</label>
                <div class="col-sm-8 col-md-8" >
                    <input type="text" class="form-control form-text" value="{{ Auth::user()->name }} " id="displayname" >
                </div>
            </div><br><br>
            <div class="form-group">
                <label for="" class="col-sm-3 col-md-3 control-label">อีเมล</label>
                <div class="col-sm-8 col-md-8" >
                    <input type="text" class="form-control form-text" value="{{ Auth::user()->email }} " id="displayname" placeholder="">
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
    <script src="{{ asset('/js/app.js') }}"></script>
