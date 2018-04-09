@extends('admin/template')
@include('navbar')
@section('test')
<br>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif
<div class="container">
<div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">เพิ่มสินค้า</div>
      <div class="panel-body">
    <div class="row">
    <form  action="{{url('/products')}}" method="post" role="form" enctype="multipart/form-data" ng-app="app" ng-controller="form">
                <div class="col-md-4">
                            <div class="form-group">  
                              รหัสสินค้า :<input type="text" class="form-control" id="id" name="id" placeholder="ป้อนรหัสสินค้า">
                            </div>
                            <div class="form-group">
                              ชื่อสินค้า :<input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="ป้อนชื่อสินค้า">
                            </div>
                            <div class="form-group">
                              ประเภท :<select class="form-control" id="pro_type" name="pro_type" ng-model="form.category">
                                        <option>ผัก</option>
                                        <option>ผลไม้</option>
                                        <option>พืชไร่</option>
                                        <option>ของแห้ง</option>
                                        <option>สินค้าทั่วไป</option>
                                    </select>
                            </div>

                            <div class="form-group">
                              ประเภทย่อย :<select class="form-control" id="subtype" name="subtype">
                            <option ng-repeat="c in categorys" ng-show="c.tpye === form.category">
                                         [[c.name]]</option>
                                     
                                    </select>
                            </div>
                            
                            
                </div>
                <div class="col-md-4">
                            <div class="form-group">
                              ต้นทุน (บาท):<input type="number" class="form-control" id="pro_price" name="pro_price" placeholder="ป้อนต้นทุน">
                            </div>
                            <div class="form-group">
                              ราคาขาย (บาท):<input type="number" class="form-control" id="pro_sale_price" name="pro_sale_price" placeholder="ป้อนราคาขาย">
                            </div>
                            <div class="form-group">
                              วันผลิต:
                              <input type="date" class="form-control" id="pro_maf_date" name="pro_maf_date">
                            </div>
                            <div class="form-group">  
                              วันหมดอายุ :<input type="date" class="form-control" id="pro_ex_date" name="pro_ex_date">
                            </div>
                </div>
                <div class="col-md-4">
                            <div class="form-group">
                              จำนวน :<input type="number" class="form-control" id="pro_amount" name="pro_amount" placeholder="ป้อนจำนวนสินค้า">
                            </div>
                            <!-- <div class="form-group">
                              หน่วยสินค้า :<select class="form-control" id="unit" name="unit">
                                        <option></option>
                                        <option>ลัง</option>
                                        <option>ถุง</option>
                                        <option>แผง</option>
                                    </select>
                            </div> -->
                            <div class="form-inline"><body onload="hiddenn('0')">
                              หน่วยสินค้า :
                                        <input type="radio" name="unit" value="กิโลกรัม" onclick="hiddenn('0')"> กิโลกรัม
                                        <input type="radio" name="unit" value="ลัง" onclick="hiddenn('0')"> ลัง
                                        <input type="radio" name="unit" value="แผง" onclick="hiddenn('0')"> แผง
                                        <input type="radio" name="unit" value="ถุง" onclick="hiddenn('0')"> ถุง
                                        <input type="radio" name="unit" value="กำ" onclick="hiddenn('0')"> กำ
                                        <input type="radio" name="unit" onclick="hiddenn('1')"> อื่น ๆ
                                        <input type="text" name="txt1" id="txt1"  class="form-control" style="width:150px;">
                            </div><br>
                            รูปภาพ :<input type="file" class="form-control" id="img" name="img" placeholder="img"><br>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button id="submit" name="submit" class="btn btn-success">เพิ่มสินค้า</button>
                            </div>
                  </div>     
                          </form>
                        </div>
                      </div>
                    <div>
                  </div>
                </div>
              <div>
            </div>
          <div>

    <!-- Scripts -->

<script src="{{ asset('/js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

<script>var app = angular.module('app', [], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });
        app.config(['$sceProvider', function ($sceProvider) {
            $sceProvider.enabled(true);
        }]);
        app.controller('form', function ($scope) {
            $scope.form = {}
            $scope.categorys = [
              {tpye:"",name:''},
              {tpye:"ผัก",name:'ผักทั่วไป'},{tpye:"ผัก",name:'ผักปรุงรส'},
              {tpye:"ผัก",name:'ผักเมืองหนาว'},{tpye:"ผัก",name:'ผักพื้นบ้าน'},
              {tpye:"ผลไม้",name:'ผลไม้ทั่วไป'},{tpye:"ผลไม้",name:'ผลไม้ฤดูกาล'},
              {tpye:"ผลไม้",name:'ผลไม้ต่างประเทศ'},{tpye:"พืชไร่",name:'พืชไร่'},
              {tpye:"ของแห้ง",name:'ของแห้ง'},
              {tpye:"สินค้าทั่วไป",name:'สินค้าอุปโภค'},{tpye:"สินค้าทั่วไป",name:'สินค้าบริโภค'},
            ]
        });
</script>

<script>
function hiddenn(pvar) {
   if(pvar==0){
    document.getElementById("txt1").style.display = 'none';
   }else{
   document.getElementById("txt1").style.display = '';
   }   
}
</script>

@endsection
