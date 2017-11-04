<link rel="stylesheet" type="text/css" href="css/testfilter.css">
               <!--  <div class="panel-body"> -->
<div class="container">
        <div class="row">
        <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">Product</h3>
            <div class="pull-right">
              <a class='btn btn-default btn-xs' href="products/create"><span class="glyphicon glyphicon-plus"></span> เพิ่มสินค้า</a>
              <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter">
              </span> Filter</button>
                </div>
            </div>
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
                        <th><input type="text" class="form-control" placeholder="ตัวเลือก" disabled></th>
                    </tr>
                    </thead>
                                    @foreach($products as $index => $col)
                                      <tbody>
                                            <tr>
                                              <td style="width: 5%"><center>{{$NUM_PAGE*($page-1) + $index+1}}</center></td>
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
                                            <!--   <img src="uploads/images/vagitable/{{$col->picture}}"> -->
                                                <!-- div class="text-center">
                                                    <input min="0" max="3000" type="number" name="amount" value="{{$col->pro_amount}}">
                                                </div> -->
                                              
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