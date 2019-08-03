@extends('admin.index')

@section('content')
	<div class="col-md-10">
		<div id="container" style="height: 300px">
			<input id="year1" type="hidden" name="" value="{{$loaibanh}}">
		</div>
	</div>
@endsection
@section('script')
 <script src="http://code.highcharts.com/highcharts.js"></script>
 <script>
 	
 	document.addEventListener('DOMContentLoaded', function (){
 		var loaibanh = $('#year1').val();
        var loaibanh = JSON.parse(loaibanh);
        var chartData = [];
        loaibanh.forEach(function(element){
        var ele = {name : element.name, y : parseFloat(element.y) };
        chartData.push(ele);
    });
        console.log(loaibanh);
 		// var year1 = JSON.parse(year);

 		// var listyear = [];
 		// var listSP = [];
   //      console.log(listSP);
 		// year1.forEach(function(element){
 		// 	listyear.push(element.year);
 		//  	listSP.push(element.SP);
 		// });
 		Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Type Product '
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: loaibanh
            }]
        });
    });
    
 </script>
@endsection