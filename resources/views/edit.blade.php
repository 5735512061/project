@extends('admin/template')
@section('test')
@include('navbar')
<br><br><br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">        
                <div class="panel-body">
                   <div class="container">
            <div class="row">
                <div class="col-sm-4">
                          <form  action="/addusers/{{$adduser->id}}" method="post" role="form">
                            <div class="form-group">  
                              รหัสผู้ใช้งาน :<input type="text" class="form-control" id="id" name="id" value="{{$adduser->id}}">
                            </div>
                            <div class="form-group">
                              ชื่อผู้ใช้งาน :<input type="text" class="form-control" id="username" name="username" value="{{$adduser->username}}">
                            </div>
                </div>
                <div class="col-sm-4">
                            <div class="form-group">
                              สิทธิ์การใช้งาน:<input type="text" class="form-control" id="access" name="access" value="{{$adduser->access}}">
                            </div>
                            <div class="form-group">
                              สถานะ:<input type="text" class="form-control" id="status" name="status" value="{{$adduser->status}}">
                            </div>
                            {{ csrf_field() }}
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