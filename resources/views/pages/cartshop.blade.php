@extends('layout.master')

@section('content')
	<div id="content" class="space-top-none">
				<form action="">
					<table class="giohang">
						<caption>Giỏ hàng của bạn</caption>
						<thead>
							<tr>
								<th>image</th>
								<th>Ten san pham</th>
								<th>So Luong</th>
								<th>action</th>
								<th>Gia</th>
								<th>Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
							@foreach($content as $ct)
							<tr>
								<td>
									<img width="70" src="source/image/product/{{$ct['attributes']['img']}}" alt="">
								</td>
								<td>{{$ct['name']}}</td>
								<td>
									<input width="10" type="" name="" value="{{$ct['quantity']}}">
								</td>
								<td>
									<a href="xoacartshop/{{$ct['id']}}" title="">delete</a>||
									
 									<button  id="updatecart" type="">Edit</button>
								</td>
								<td>{{$ct['price']}}</td>
								<td>{{$ct['quantity']*$ct['price']}}</td>

							</tr>
							@endforeach
						</tbody>
					</table>
					<br><br>
					<label for="">Tổng tiền</label>
					<input type="" name="" value="{{$total}}" disabled="">	
				
					<button type=""><a href="trangchu" title="">Tiếp tục mua sắm</a></button>
					<button type=""><a href="dathang" title="">Đặt Hàng</a></button>
	

					{{ csrf_field() }}
				</form>
				
		</div> <!-- #content -->
@endsection