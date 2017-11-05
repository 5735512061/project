@extends('admin/template')
<link rel="stylesheet" type="text/css" href="css/testfilter.css">
@section('test')
@include('navbar')
             <br><br>
               <!--  <div class="panel-body"> -->
<div class="container">
        <div class="row">
        <a class='btn btn-info btn-md' href="{{url('/balancepdf')}}"> <span class="glyphicon glyphicon-export"></span> Export PDF</a>
        <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">สินค้าคงเหลือ</h3>
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
                                    @foreach($product as $col)
                                      <tbody>
                                            <tr>
                                              <td style="width: 8%"><center>{{$col->id}}</center></td>
                                              <td style="width: 8%"><center>{{$col->pro_name}}</center></td>
                                              <td style="width: 8%"><center>{{$col->pro_type}}</center></td>
                                              <td style="width: 10%"><center>{{$col->subtype}}</center></td>
                                              <td style="width: 9%"><center>{{$col->pro_price}}</center></td>
                                              <td style="width: 10%"><center>{{$col->pro_sale_price}}</center></td>
                                              <td style="width: 8%"><center>{{$col->pro_maf_date}}</center></td>
                                              <td style="width: 8%"><center>{{$col->pro_ex_date}}</center></td>
                                              <td style="width: 10%"><center>{{$col->pro_amount}} ({{$col->unit}})</center></td>  
                                              <td style="width: 6%"><center><a href=""><span class="glyphicon glyphicon-eye-open"></span></a></center></td>
                                                <!-- div class="text-center">
                                                    <input min="0" max="3000" type="number" name="amount" value="{{$col->pro_amount}}">
                                                </div> -->
                                              </td>
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
@endsection