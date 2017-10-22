@extends('admin/template')
@section('test')
            <!--   <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">สินค้า</h3>
                  </div>
                </div>
              </div> -->
<!-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <nav class="navbar navbar-default">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="home1">หน้าแรก</a></li>
                            <li><a href="product">คลังสินค้า</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">บทความ</a></li>
                            <li><a href="#">กระดานถาม-ตอบ</a></li>
                        </ul>
                      </div>
                  </nav>

              </div>
 -->
@include('admin.navbar')
             
@include('admin.leftmenu')
               <!--  <div class="panel-body"> -->
                   <div class="container">
                  <div class="row">
                      <div class="col-md-9">
                       <h4>จำนวนสินค้าคงเหลือ</h4><hr>
                        <!--  <div class="row col-md-6 col-md-offset-2 custyle"> -->
                        <div class="table-responsive">
                          <div class="panel panel-default panel-table"> 
                    <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr>
                            <th class="text-center">รหัสสินค้า</th>
                            <th class="text-center">ชื่อสินค้า</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center">วันผลิต</th>
                            <th class="text-center">วันหมดอายุ</th>
                            <th class="text-center">จำนวน</th>
                        </tr>
                    </thead>
                                    @foreach($product as $col)
                                      <tbody>
                                            <tr>
                                              <td>{{$col->id}}</td>
                                              <td>{{$col->pro_name}}</td>
                                              <td>{{$col->pro_type}}</td>
                                              <td>{{$col->pro_maf_date}}</td>
                                              <td>{{$col->pro_ex_date}}</td>
                                              <td>{{$col->pro_amount}}
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