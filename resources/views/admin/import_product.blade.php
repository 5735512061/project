<link rel="stylesheet" type="text/css" href="css/testfilter.css">
<link href="/css/lightbox.css" rel="stylesheet">
<script src="/js/lightbox.js"></script>
<script type="text/javascript">
$(function() {
    $(".uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            $temp = this;
            console.log($temp);
            reader.onloadend = function(){ // set image data as background of div
                $($temp).closest(".imagePreview-set").find(".imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
<div class="container">
  <div class="row">
  <form action="postImport" method="post" enctype="multipart/form-data">
  <!-- Trigger the modal with a button -->
    <a class='btn btn-success btn-md' data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-import"></span> Import Excel</a>
    <a class='btn btn-info btn-md' href="{{url('/ExportProducts')}}"> <span class="glyphicon glyphicon-export"></span> Export Excel</a>
    <a class='btn btn-info btn-md' href="{{url('/pdf')}}"> <span class="glyphicon glyphicon-export"></span> Export PDF</a>
    <div class="pull-right">
          <a class='btn btn-danger btn-md' href="{{url('/deleteAll')}}"><span class="glyphicon glyphicon-trash"></span> Delete All</a>
          <a class='btn btn-danger btn-md' href="{{url('/deleteAll')}}"><span class="glyphicon glyphicon-trash"></span> Delete</a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Excel</h4>
    </div>
        <div class="modal-body">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="file" class="form-control" name="products"><br>
         <!--  <input type="submit" value="Import"></input> -->
           <button id="submit" name="submit" class="btn btn-success">Import</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</form>
        <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">คลังสินค้า</h3>
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
                                              <td style="width: 6%"><center><a class="example-image-link" href="uploads/images/vagitable/{{$col->picture}}" data-lightbox="{{$col->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></center></td>
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
    <script src="{{ asset('js/testfilter.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>