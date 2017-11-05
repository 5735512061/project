<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ExportExcel</title>
</head>
<body>
	<table>
		<tr>                   
      <th>รหัสสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>ประเภท</th>
      <th>ประเภทย่อย</th>
      <th>ต้นทุน (บาท)</th>
      <th>ราคาขาย (บาท)</th>
      <th>วันผลิต</th>
      <th>วันหมดอายุ</th>
      <th>จำนวน (หน่วย)</th>
    </tr>
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
              <td>{{$col->pro_amount}} ({{$col->unit}})</td>
            </tr>
      </tbody>
    @endforeach 
	</table>
</body>
</html>