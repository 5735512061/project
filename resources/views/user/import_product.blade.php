
<div class="container">
    <div class="row">
    
        <div class="col-md-9">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">สินค้า</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>

                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภท</th>
                        <th>ต้นทุน</th>
                        <th>ราคาขาย</th>
                        <th>วันผลิต</th>
                        <th>วันหมดอายุ</th>
                        <th>จำนวน</th>
                        <th>รายละเอียด</th>
                    </tr> 
                  </thead>
                   @foreach($products as $col)
                    <tbody>
                          <tr>
                            <td>{{$col->product_id}}</td>
                            <td>{{$col->pro_name}}</td>
                            <td>{{$col->pro_type}}</td>
                            <td>{{$col->pro_price}}</td>
                            <td>{{$col->pro_sale_price}}</td>
                            <td>{{$col->pro_maf_date}}</td>
                            <td>{{$col->pro_ex_date}}</td>
                            <td>{{$col->pro_amount}}</td>
                            <td>{{$col->pro_detail}}</td>
                          </tr>
                    </tbody>
                    @endforeach
                </table>
                    
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">หน้า 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

</div>
</div>
</div>