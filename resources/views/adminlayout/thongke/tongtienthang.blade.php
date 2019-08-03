@extends('admin.index')

@section('content')
	<div class="col-md-10">
		<div id="container" style="height: 300px">
			<input id="year1" type="hidden" name="" value="{{$money}}">
		</div>
	</div>
@endsection
@section('script')
 <script src="http://code.highcharts.com/highcharts.js"></script>
 <script>
 	
 	document.addEventListener('DOMContentLoaded', function (){
 		var year = $('#year1').val();
 		var year1 = JSON.parse(year);

 		var listmonth = [];
 		var listmoney = [];
 		year1.forEach(function(element){
 			listmonth.push(element.month);
 		 	listmoney.push(element.sum);
 		});
 		Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Month In 2019'
        },
        xAxis: {
            categories: listmonth
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [
        {
            name: 'month',
            data: listmoney,
            color:'#3BF144',
        }],
    });
    });
    
 </script>
@endsection