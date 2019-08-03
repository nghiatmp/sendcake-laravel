@extends('admin.index')

@section('content')
	<div class="col-md-10">
		<div id="container" style="height: 300px">
			<input id="year1" type="hidden" name="" value="{{$year1}}">
		</div>
	</div>
@endsection
@section('script')
 <script src="http://code.highcharts.com/highcharts.js"></script>
 <script>
 	
 	document.addEventListener('DOMContentLoaded', function (){
 		var year = $('#year1').val();
 		var year1 = JSON.parse(year);

 		var listyear = [];
 		var listHd = [];
 		year1.forEach(function(element){
 			listyear.push(element.Nam);
 		 	listHd.push(element.SoHd);
 		});
 		Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Bill In Year'
        },
        xAxis: {
            categories: listyear
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [
        {
            name: 'bills',
            data: listHd,
            color:'#3BF144',
        }],
    });
    });
    
 </script>
@endsection