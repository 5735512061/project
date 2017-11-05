@extends('admin/template')
	<meta charset="UTF-8">
	@include('navbar')

    <div class="container">
    <div class="row">
        <div class="col-md-8">
                   <h4>ข้อมูลส่วนตัว</h4>
                   <hr>
                      <div class="panel panel-default">
                        <div class="panel-body"> 
                            <form class="form-horizontal">
                   <div class="z-form-block">
                        <div class="row">
                                <div class="col-md-8" >
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 col-md-3 control-label">ชื่อผู้ใช้งาน</label>
                                        <div class="col-sm-6 col-md-6" >
                                            <input type="text" class="form-control form-text" value="{{ Auth::user()->name }} " id="displayname" >
                                            

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 col-md-3 control-label">อีเมล</label>
                                        <div class="col-sm-6 col-md-6" >
                                            <input type="text" class="form-control form-text" value="{{ Auth::user()->email }} " id="displayname" placeholder="">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
            </form>
                        </div>
                        </div>  

<!--  -->
    </div>
</div>
</div>
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
