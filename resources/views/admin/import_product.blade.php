
            <!--   <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">สินค้า</h3>
                  </div>
                </div>
              </div> -->
<div class="container">
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

                <div class="panel-body">
                   <div class="container">
                  <div class="row">
                      <div class="col-md-9">
                        <!--  <div class="row col-md-6 col-md-offset-2 custyle"> -->
                        <div class="table-responsive">
                          <div class="panel panel-default panel-table"> 
                    <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr>
                            <th class="text-center">รหัสสินค้า</th>
                            <th class="text-center">ชื่อสินค้า</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center">ต้นทุน</th>
                            <th class="text-center">ราคาขาย</th>
                            <th class="text-center">วันผลิต</th>
                            <th class="text-center">วันหมดอายุ</th>
                            <th class="text-center">จำนวน</th>
                            <th class="text-center"><span  style="padding-left:5px" ><a class='btn btn-primary btn-xs' href="products/create"><span class="glyphicon glyphicon-plus"></span> เพิ่มสินค้า</a></th>
                        </tr>
                    </thead>
                    <!--{{ $index =0 }} -->
                                    @foreach($products as $index => $col)
                                      <tbody>
                                            <tr>
                                              <!-- <td>{{$NUM_PAGE*($page-1) + $index+1}}</td> -->
                                              <td>{{$col->id}}</td>
                                              <td>{{$col->pro_name}}</td>
                                              <td>{{$col->pro_type}}</td>
                                              <td>{{$col->pro_price}}</td>
                                              <td>{{$col->pro_sale_price}}</td>
                                              <td>{{$col->pro_maf_date}}</td>
                                              <td>{{$col->pro_ex_date}}</td>
                                              <td>{{$col->pro_amount}}
                                                <!-- div class="text-center">
                                                    <input min="0" max="3000" type="number" name="amount" value="{{$col->pro_amount}}">
                                                </div> -->
                                              </td>
                                              <form method="POST" action="products/{{$col->id}}">
                                               <td class="text-center"><a class='btn btn-info btn-xs' href="products/{{$col->id}}/edit"><span class="glyphicon glyphicon-edit"></span> แก้ไข</a> 
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
                    {{ $products->links() }}
                </div>

                </div>
            </div>
        </div>
    </div>
</div>