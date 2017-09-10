@extends('admin/template')
@section('test')
	@include('admin.navbar')
	@include('admin.leftmenu')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <nav class="navbar navbar-default">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="/home1">หน้าแรก</a></li>
                            @if (!Auth::guest())
                            <li><a href="/product">คลังสินค้า</a></li>
                            @endif
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
                <div class="col-sm-4">
                          <form  action="/products/{{$product->id}}" method="post" role="form">
                            <div class="form-group">
                              
                              รหัสสินค้า :<input type="text" class="form-control" value="{{$product->id}}" id="id" name="id" placeholder="ป้อนรหัสสินค้า">
                            </div>
                            <div class="form-group">
                              ชื่อสินค้า :<input type="text" class="form-control" value="{{$product->pro_name}}" id="pro_name" name="pro_name" placeholder="ป้อนชื่อสินค้า">
                            </div>
                            <div class="form-group">
                              ประเภท :<select class="form-control" value="{{$product->pro_type}}" id="pro_type" name="pro_type">
                                        <option>เลือกประเภทสินค้า</option>
                                        <option>ผลไม้</option>
                                        <option>ผักทั่วไป</option>
                                        <option>พืชไร่</option>
                                        <option>ของแห้ง</option>
                                        <option>ของดอง</option>
                                    </select>
                            </div>
                            <div class="form-group">
                              ต้นทุน (บาท):<input type="number" class="form-control" value="{{$product->pro_price}}" id="pro_price" name="pro_price" placeholder="ป้อนต้นทุน">
                            </div>
                            <div class="form-group">
                              ราคาขาย (บาท):<input type="number" class="form-control" value="{{$product->pro_sale_price}}" id="pro_sale_price" name="pro_sale_price" placeholder="ป้อนราคาขาย">
                            </div>
                </div>
                <div class="col-sm-4">
                            <div class="form-group">
                              วันผลิต:
                              <input type="date" class="form-control" value="{{$product->pro_maf_date}}" id="pro_maf_date" name="pro_maf_date">
                            </div>
                            <div class="form-group">  
                              วันหมดอายุ :<input type="date" class="form-control" value="{{$product->pro_ex_date}}" id="pro_ex_date" name="pro_ex_date">
                            </div>
                            <div class="form-group">
                              จำนวน :<input type="number" class="form-control" value="{{$product->pro_amount}}" id="pro_amount" name="pro_amount" placeholder="ป้อนจำนวนสินค้า">
                            </div>
                            <div class="form-group">
                              รายละเอียด :<textarea name="pro_detail" class="form-control"  id="pro_detail" rows="4" placeholder="ป้อนรายละเอียดสินค้า (ถ้ามี)">{{$product->pro_detail}}</textarea>
                            </div>
                           
                            <div class="form-group">
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}  
                                <button id="submit" name="submit" class="btn btn-primary">อัพเดตสินค้า</button>
                            </div> 
                          </div>         
                         </form>
                        </div>
 

                </div>  
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