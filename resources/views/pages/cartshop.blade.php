@extends('layout.master')

@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
				<form action="">
					<table class="giohang table-striped table-hover table-responsive" >
						<caption>Giỏ hàng của bạn</caption>
						<thead>
							<tr>
								<th>image</th>
								<th>Tên Sản Phẩm</th>
								<th>Số Lượng</th>
								<th>Action</th>
								<th>Gía Tiền</th>
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
									<input class="qty" width="10" type="number" name="" value="{{$ct['quantity']}}">
								</td>
								<td>
									<a href="xoacartshop/{{$ct['id']}}" title="" class="btn btn-danger">Delete</a>
									
 									<a href="cartshop" title="" class="btn btn-success update" id="{{$ct['id']}}">Edit</a>
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
				
					{{-- <button type=""><a href="trangchu" title="">Tiếp tục mua sắm</a></button> --}}
					<a href="trangchu" title="" class=" btn btn-success">Tiếp Tục Mua Sắm</a>
					<a href="dathang" title="" class="btn btn-danger">Đặt Hàng</a>
	

					{{ csrf_field() }}
				</form>
				<div id="content">
					
				</div>
		</div> <!-- #content -->
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$(function(){
			$('.update').click(function(){
				var id = $(this).attr('id');
				var qty = $(this).parent().parent().find('.qty').val();
				var token = $("input[name='_token']").val();
				// alert(token);
			});
			$.ajax({
				url:'editcartshop/'+id+'/'+qty,
				type:'GET',
				cache:false,
				data:{'_token':token,'id':id,'qty':qty},
				success: function(data){
					// if(data == 'oke'){
					// 	alert('yes');
					// }
				}
			});
		});
	</script>
@endsection