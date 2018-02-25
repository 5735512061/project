@extends('admin/template')
@include('navbar')
<br><br><br><br><br><br><br><br>     
<center><div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['ผัก', 8],
  ['ผลไม้', 2],
  ['พืชไร่', 4],
  ['ของแห้ง', 2],
  ['สินค้าทั่วไป', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script></center>
