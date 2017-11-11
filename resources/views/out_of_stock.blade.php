@extends('admin/template')
@section('test')
	<meta charset="UTF-8">
  <link href="{{asset('css/bootstrap-tableadmin.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/testfilter.css">
  <link href="/css/lightbox.css" rel="stylesheet">

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
          <li><a href="{{url('/ExportProducts')}}">Export to Excel</a></li>
          <li><a href="{{url('/pdf')}}">Export to PDF</a></li>
        </ul>
      </div>
        <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">สินค้าใกล้หมดคลัง</h3>
            <div class="pull-right">
              <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter">
              </span> Filter</button>
                </div>
            </div>
            <?php
              $index1 = 0;
            ?>
            <table class="table">
                <thead>
                        <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ลำดับ" disabled></th>
                        <th><input type="text" class="form-control" placeholder="รหัสสินค้า" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ชื่อสินค้า" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ประเภท" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ประเภทย่อย" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ต้นทุน (บาท)" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ราคาขาย (บาท)" disabled></th>
                        <th><input type="text" class="form-control" placeholder="วันผลิต" disabled></th>
                        <th><input type="text" class="form-control" placeholder="วันหมดอายุ" disabled></th>
                        <th><input type="text" class="form-control" placeholder="จำนวน (หน่วย)" disabled></th>
                        <th><input type="text" class="form-control" placeholder="รูปภาพ" disabled></th>
                    </tr>
                    </thead>
                                    @foreach($products as $index1 => $index)
                                      <tbody>
                                            <tr>
                                              <td style="width: 6%">{{$index1+1}}</td>
                                              <td style="width: 8%"><center>{{$index->id}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_name}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_type}}</center></td>
                                              <td style="width: 10%"><center>{{$index->subtype}}</center></td>
                                              <td style="width: 9%"><center>{{$index->pro_price}}</center></td>
                                              <td style="width: 10%"><center>{{$index->pro_sale_price}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_maf_date}}</center></td>
                                              <td style="width: 8%"><center>{{$index->pro_ex_date}}</center></td>
                                              <td style="width: 10%"><center>{{$index->pro_amount}} ({{$index->unit}})</center></td>  
                                              <td style="width: 6%"><center><a class="example-image-link" href="uploads/images/vagitable/{{$index->picture}}" data-lightbox="{{$index->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></center></td>
                                            </tr>
                                      </tbody>
                                    @endforeach  
                                  
                    </table>
                    </div>
                </div>

                </div>
  <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/testfilter.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/lightbox.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
@endsection