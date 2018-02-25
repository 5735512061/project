@extends('admin/template')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="{{asset('/css/bootstrap-tableadmin.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-tableadmin.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link href="{{asset('css/bootstrap-menu.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>    

</head>
<body>

@include('navbar')
<br><br><br><br><br><br><br><br>

                   <div class="container">
                  <div class="row">
                      <div class="col-md-9">
                      <h4>ผู้ใช้งานระบบ</h4><hr>
                        <!--  <div class="row col-md-6 col-md-offset-2 custyle"> -->
                          <div class="panel panel-default panel-table"> 
                    <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr>
                            <th>รหัสผู้ใช้งาน</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <!-- <th>วันที่สมัครใช้งาน</th>
                            <th>เข้าใช้งานล่าสุด</th> -->
                            <th>สิทธิ์การใช้งาน</th>
                            <th>สถานะ</th>
                            <th><center><span  style="padding-left:5px" ><a class='btn btn-primary btn-xs' href="/addusers/create"><span class="glyphicon glyphicon-plus"></span> เพิ่มผู้ใช้งาน</a></center></th>
                        </tr>
                    </thead>

                    <!--{{ $index =0 }} -->
                                    @foreach($addusers as $index => $col)
                                      <tbody>
                                            <tr>
                                              <!-- <td>{{$NUM_PAGE*($page-1) + $index+1}}</td> -->
                                              <td>{{$col->id}}</td>
                                              <td>{{$col->username}}</td>
                                              <!-- <td>{{$col->date}}</td>
                                              <td>{{$col->latest}}</td> -->
                                              <td>{{$col->access}}</td>
                                              <td>{{$col->status}}</td>
                                              <form method="POST" action="addusers/{{$col->id}}">
                                               <td class="text-center"><a class='btn btn-info btn-xs' href="addusers/{{$col->id}}/edit"><span class="glyphicon glyphicon-edit"></span> แก้ไข</a> 
                                               <input type="hidden" name="_method" value="Delete">
                                               <button  class="btn btn-danger btn-xs">
                                               <span class="glyphicon glyphicon-remove"></span> ลบ</button>{{csrf_field()}}
                                               </td>
                                               </form>
                                               

                                            </tr>
                                      </tbody>
                                    @endforeach
                                    
                    </table>
                    </div>
                   
                </div>

                </div>
            </div>
        </div>
<!--     </div>
</div> -->


<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}"></script>
	
</body>
</html>