<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>สินค้าคงเหลือ</title>
	<style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
		table{
			border-collapse: collapse;
		}
		td,th{
			border:1px solid;
		}
	</style>
</head>
<body>

                      <h2>สินค้าคงเหลือ</h2>
                        <!--  <div class="row col-md-6 col-md-offset-2 custyle"> -->
                        <div class="table-responsive">
                          <div class="panel panel-default panel-table"> 
                    <table class="table table-striped table-bordered table-list">
                    <thead>
                        <tr>
                            
                            <th class="text-center">รหัสสินค้า</th>
                            <th class="text-center">ชื่อสินค้า</th>
                            <th class="text-center">ประเภท</th>
                            <th class="text-center">ประเภทย่อย</th>
                            <th class="text-center">ต้นทุน (บาท)</th>
                            <th class="text-center">ราคาขาย (บาท)</th>
                            <th class="text-center">วันผลิต</th>
                            <th class="text-center">วันหมดอายุ</th>
                            <th class="text-center">จำนวน (หน่วย)</th>
                        </tr>
                    </thead>
                                    @foreach($products as $index => $col)
                                      <tbody>
                                            <tr>
                                              <td>{{$col->id}}</td>
                                              <td>{{$col->pro_name}}</td>
                                              <td>{{$col->pro_type}}</td>
                                              <td>{{$col->subtype}}</td>
                                              <td>{{$col->pro_price}}</td>
                                              <td>{{$col->pro_sale_price}}</td>
                                              <td>{{$col->pro_maf_date}}</td>
                                              <td>{{$col->pro_ex_date}}</td>
                                              <td>{{$col->pro_amount}} ({{$col->unit}})
                                              </td>
                                            </tr>
                                      </tbody>
                                    @endforeach                
                    </table>
                    </div>
                </div>

</body>
</html>