@extends('admin/template')
@section('test')
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
    <link rel="stylesheet" type="text/css" href="css/testfilter.css">
    <link href="/css/lightbox.css" rel="stylesheet">

@include('navbar')
<br><br><br><br><br><br><br><br>

<div class="container">
        <div class="row">
      <a class='btn btn-info btn-md' href="{{url('/ExportBalance')}}"> <span class="glyphicon glyphicon-export"></span> Export Excel</a>
      <a class='btn btn-info btn-md' href="{{url('/balancepdf')}}"> <span class="glyphicon glyphicon-export"></span> Export PDF</a>
        <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">สินค้าใกล้หมดคลัง</h3>
            <div class="pull-right">
              <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter">
              </span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                        <tr class="filters">
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
                                    @foreach($product as $index)
                                      <tbody>
                                            <tr>
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
            </div>
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