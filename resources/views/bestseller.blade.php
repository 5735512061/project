@extends('admin/template')
@section('test')
	<meta charset="UTF-8">
  <link href="{{asset('/css/bootstrap-tableadmin.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/testfilter.css">
  <link href="/css/lightbox.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@include('navbar')
<br><br><br><br><br><br><br><br>            
<div class="container">
    <div class="row">
      <div class="btn-group">
        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-export"></span> Export</button>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{url('/ExportProducts')}}"><span class="glyphicon glyphicon-file"></span> Export to Excel</a></li>
          <li><a href="{{url('/pdf')}}"><span class="glyphicon glyphicon-file"></span> Export to PDF</a></li>
        </ul>
      </div>
      <a class='btn btn-success btn-md' data-toggle="modal" data-target="#myModal2"><i class="fa fa-line-chart"></i> Charts</a>
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Charts</h4>
    </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <a class='btn btn-warning btn-md' data-toggle="modal" data-target="#myModal3"><i class="fa fa-pie-chart"></i> Pie Charts</a>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pie Chart</h4>
    </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


      <!-- <div class="btn-group">
        <button type="button" class="btn btn-warning"><i class="fa fa-line-chart"></i> Graph</button>
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{url('/chart')}}"><i class="fa fa-bar-chart"></i> Charts</a></li>
          <li><a href="{{url('/piechart')}}"><i class="fa fa-pie-chart"></i> Pie Chart</a></li>
        </ul>
      </div> -->
      <form action="{{url('/top')}}">
        <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">สินค้าขายดี</h3>
            <div class="pull-right">
              <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter">
              </span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                        <tr class="filters">
                        <!-- <th><input type="text" class="form-control" placeholder="ลำดับ" disabled></th>
                        <th><input type="text" class="form-control" placeholder="รหัสสินค้า" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ชื่อสินค้า" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ประเภท" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ประเภทย่อย" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ต้นทุน (บาท)" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ราคาขาย (บาท)" disabled></th>
                        <th><input type="text" class="form-control" placeholder="วันผลิต" disabled></th>
                        <th><input type="text" class="form-control" placeholder="วันหมดอายุ" disabled></th> -->
                        <th><input type="text" class="form-control" placeholder="จำนวน (หน่วย)" disabled></th>
                        <!-- <th><input type="text" class="form-control" placeholder="รูปภาพ" disabled></th> -->
                    </tr>
                    </thead>
                            @foreach($products as $index1 => $index)
                                      <tbody>
                                            <tr>
                                              <!-- <td style="width: 6%">{{$index1+1}}</td>
                                              <td style="width: 8%"><center>{{$index->id}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_name}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_type}}</center></td>
                                              <td style="width: 10%"><center>{{$index->subtype}}</center></td>
                                              <td style="width: 9%"><center>{{$index->pro_price}}</center></td>
                                              <td style="width: 10%"><center>{{$index->pro_sale_price}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_maf_date}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_ex_date}}</center></td>
                                              <td style="width: 10%"><center>{{$index->pro_amount}} ({{$index->unit}})</center></td> -->
                                              <td style="width: 10%"><center>{{$index->$amount}}</center></td>   
                                              <!-- <td style="width: 6%"><center><a class="example-image-link" href="uploads/images/vagitable/{{$index->picture}}" data-lightbox="{{$index->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></center></td> -->
                                            </tr>
                                      </tbody>
                                    @endforeach  
                    </table>
                    </div>
                    </form>
                </div>

                </div>

      <script src="{{ asset('/js/app.js') }}"></script>
      <script src="{{ asset('/js/testfilter.js') }}"></script>
      <script src="{{ asset('/js/app.js') }}"></script>
      <script src="{{ asset('/js/lightbox.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

@endsection