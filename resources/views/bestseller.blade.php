@extends('admin/template')
@section('test')
  <meta charset="UTF-8">
  <link href="{{asset('/css/bootstrap-tableadmin.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/testfilter.css">
  <link href="/css/lightbox.css" rel="stylesheet">
@include('navbar')
<br>     
<div class="container">
    <div class="row">
      <div class="btn-group">
        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-export"></span> Export</button>
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{url('/ExportProducts')}}"><span class="glyphicon glyphicon-file"></span> Export to Excel</a></li>
          <li><a href="{{url('/pdf')}}"><span class="glyphicon glyphicon-file"></span> Export to PDF</a></li>
        </ul>
      </div>
      <a class='btn btn-success btn-md' data-toggle="modal" data-target="#myModal2"><i class="fa fa-line-chart"></i> Charts</a>
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Charts</h4>
    </div>
        <div class="modal-body" >
            <canvas id="lineChart" ></canvas>      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <a class='btn btn-warning btn-md' data-toggle="modal" data-target="#myModal3"><i class="fa fa-pie-chart"></i> Pie Charts</a>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pie Chart</h4>
    </div>
        <div class="modal-body">
            <canvas id="pieChart"></canvas>  
        </div>            
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


      <!-- <div class="btn-group">
        <button type="button" class="btn btn-warning"><i class="fa fa-line-chart"></i> Graph</button>
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{url('/chart')}}"><i class="fa fa-bar-chart"></i> Charts</a></li>
          <li><a href="{{url('/piechart')}}"><i class="fa fa-pie-chart"></i> Pie Chart</a></li>
        </ul>
      </div> -->
      <form action="{{url('/top')}}">
        <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">สินค้าขายดี Top10</h3>
            </div>
          <div class="table-responsive">
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
                        <th><input type="text" class="form-control" placeholder="จำนวนสินค้า" disabled></th>
                    </tr>
                    </thead>
                        @foreach($amount as $index1 => $index)
                          <tbody>
                            <tr>
                              <td style="width: 4%">{{$index1+1}}</td>
                              <td style="width: 6%"><center>{{$index->pro_id}}</center></td>
                              <td style="width: 8%">
                                <?php echo (DB::table('products')->where('id',$index->pro_id)->value('pro_name'));?>
                              </td>
                              <td style="width: 8%">
                                <?php echo (DB::table('products')->where('id',$index->pro_id)->value('pro_type'));?>
                              </td>
                              <td style="width: 8%">
                                <?php echo (DB::table('products')->where('id',$index->pro_id)->value('subtype'));?>
                              </td>
                              <td style="width: 8%">
                                <?php echo (DB::table('products')->where('id',$index->pro_id)->value('pro_price'));?>
                              </td>
                              <td style="width: 8%">
                                <?php echo (DB::table('products')->where('id',$index->pro_id)->value('pro_sale_price'));?>
                              </td>
                              <td style="width: 8%">
                                <?php echo (DB::table('products')->where('id',$index->pro_id)->value('pro_maf_date'));?>
                              </td>
                              <td style="width: 8%">
                                <?php echo (DB::table('products')->where('id',$index->pro_id)->value('pro_ex_date'));?>
                              </td>
                              <td style="width: 8%">{{$index->cnt}} <?php echo (DB::table('products')->where('id',$index->pro_id)->value('unit'));?></td>
                            </tr>
                          </tbody>
                        @endforeach  
                    </table>
                  </div>
                    </div>
                    </form>
                </div>

                </div>

      <script src="{{ asset('/js/Chart.min.js') }}"></script>
      <script src="{{ asset('/js/app.js') }}"></script>
      <script src="{{ asset('/js/testfilter.js') }}"></script>
      <script src="{{ asset('/js/app.js') }}"></script>
      <script src="{{ asset('/js/lightbox.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript">       
//pie
var ctxP = document.getElementById("pieChart").getContext('2d');
var vagetable = {!! $vagetable !!};
var fruit = {!! $fruit !!};
var plant = {!! $plant !!};
var dried = {!! $dried !!};
var general = {!! $general !!};
var myPieChartdata = new Chart(ctxP, {
    type: 'pie',
    data: {
        labels: ["ผัก", "ผลไม้", "พืชไร่", "ของแห้ง", "สินค้าทั่วไป"],
        datasets: [
            {
                data: [{!! $vagetable !!},{!! $fruit !!},{!! $plant !!},{!! $dried !!}, {!! $general !!}],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }
        ]
    },
    options: {
        responsive: true
    }    
});
console.log(amount);
console.log("myPieChart");
</script>
<script type="text/javascript">
//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var vagetable = {!! $vagetable !!};
var fruit = {!! $fruit !!};
var plant = {!! $plant !!};
var dried = {!! $dried !!};
var general = {!! $general !!};
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["ผัก", "ผลไม้", "พืชไร่", "ของแห้ง", "สินค้าทั่วไป"],
        datasets: [
            {
                label: "สินค้าขายดี",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [{!! $vagetable !!},{!! $fruit !!},{!! $plant !!},{!! $dried !!}, {!! $general !!}]
            },
        ]
    },
    options: {
        responsive: true
    }    
});
            
</script>

@endsection