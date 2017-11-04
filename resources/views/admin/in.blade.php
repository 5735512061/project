@extends('admin/template')
@section('test')
<!-- -->
    
                <div class="panel-body">
                   <div class="container">
            <div class="row">
            <h4>เพิ่มสินค้า</h4>
            <hr>
                <div class="col-md-6">
                          
                          <form  action="/products" method="post" role="form" enctype="multipart/form-data" ng-app="app" ng-controller="form">
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
                                        <option>สินค้าแปรรูป</option>
                                        <option>สินค้าทั่วไป</option>
                                    </select>
                            </div>

                            <div class="form-group">
                              ประเภทย่อย :<select class="form-control" id="subtype" name="subtype">
                            <option ng-repeat="c in categorys" ng-show="c.tpye === form.category">
                                         [[c.name]]</option>
                                     
                                    </select>
                            </div>
                            <div class="form-group">
                              ต้นทุน (บาท):<input type="number" class="form-control" id="pro_price" name="pro_price" placeholder="ป้อนต้นทุน">
                            </div>
                            
                </div>
                <div class="col-md-6">
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
                            <div class="form-group">
                              จำนวน :<input type="number" class="form-control" id="pro_amount" name="pro_amount" placeholder="ป้อนจำนวนสินค้า">
                            </div>
                            <div class="form-group">
                              หน่วยสินค้า :<select class="form-control" id="unit" name="unit">
                                        <option></option>
                                        <option>ลัง</option>
                                    </select>
                            </div>
                            รูปภาพ :<input type="file" class="form-control" id="img" name="img" placeholder="img"><br>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button id="submit" name="submit" class="btn btn-primary">เพิ่มสินค้า</button>
                            </div>
                       
                          </form>

                          <!--
                          <form action="{{url('/upload')}}" method="post" enctype="multipart/form-data">
                          {{CSRF_FIELD()}}

                          
                          <button id="submit" name="submit" class="btn btn-primary">อัพโหลดรูปภาพ</button>
                          </form>
                          -->
                        </div>
 </div>   

                </div>  
            </div>
        </div>
<!--  -->
    </div>

            </div>
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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
              {tpye:"สินค้าแปรรูป",name:'สินค้าแปรรูป'},
              {tpye:"สินค้าทั่วไป",name:'สินค้าอุปโภค'},{tpye:"สินค้าทั่วไป",name:'สินค้าบริโภค'},
            ]
        });
        </script>
@endsection