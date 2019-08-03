@extends('admin.index')

@section('content')
	<div class="col-md-10">
		<div id="container" style="height: 300px">
			<input id="year1" type="hidden" name="" value="{{$year}}">
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
 		var listSP = [];
        console.log(listSP);
 		year1.forEach(function(element){
 			listyear.push(element.year);
 		 	listSP.push(element.SP);
 		});
 		Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Product In Year'
        },
        xAxis: {
            categories: listyear
        },
        yAxis: {
            title: {
                text: 'Break Cake'
            }
        },
        series: [
        {
            name: 'Product',
            data: listSP,
            color:'#4A2BEF',
        }],
    });
    });
    
 </script>
@endsection