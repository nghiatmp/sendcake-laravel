@extends('admin.index')
@section('content')
	<div class="col-sm-10" style="">
			<div class="col-sm-12">
				<h2 class="page-header"> Sửa Sản Phẩm
					
				</h2>
				 <div class="col-sm-12">
				 	@if(count($errors) > 0 )
				 		<div class="alert alert-danger">
				 			@foreach($errors->all() as $err)
				 				{{$err}}<br>
				 			@endforeach
				 		</div>
				 	@endif
				 	@if(session('loi'))
				 		<div class="alert alert-danger">
				 			{{session('loi')}}
				 		</div>
				 	@endif
				 	@if(session('loi2'))
				 		<div class="alert alert-danger">
				 			{{session('loi2')}}
				 		</div>
				 	@endif
				 	@if(session('thongbao'))
				 		<div class="alert alert-success">
				 			{{session('thongbao')}}
				 		</div>
				 	@endif
				 	<form class="formthemloaibanh" action="admin/sanpham/edit/{{$sanpham->id}}" method="post" enctype="multipart/form-data">
				 		<table class="nhanvien" >
				 			<tr>
				 				<td>Loại Bánh</td>
				 				<td>
				 					<select name="loaibanh" >
				 						@foreach($loaibanh as $sl)
				 							<option value="{{$sl->id}}" 
												@if($sl->id == $sanpham->id_type)
												{{'selected'}}
												@endif
				 								>{{$sl->name}}</option>
				 						@endforeach	
				 					</select>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Tên Bánh</td>
				 				<td>
				 					<input type="text" name="name" placeholder="Nhập Tên Bánh" class="input1" value="{{$sanpham->name}}">
				 				</td>
				 			</tr>
				 			
				 			<tr>
				 				<td>Miêu Tả</td>
				 				<td>
				 					<input type="text" name="des" placeholder="Miêu Tả Bánh" class="input1" value="{{$sanpham->description}}">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Gía Tiền</td>
				 				<td>
				 					<input type="text" name="unit" placeholder="Nhập Gía Tiền" class="input1" value="{{$sanpham->unit_price}}">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Gía Khuyến Mại</td>
				 				<td>
				 					<input type="text" name="promotion" placeholder="Nhập Gía Khuyến Mại" class="input1" value="{{$sanpham->promotion_price}}">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Hình Anh Cũ</td>
				 				<td>
				 					<img width="200" src="source/image/product/{{$sanpham->image}}" alt="">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Hình Anh</td>
				 				<td>
				 					<input type="file" name="image" class="input1">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Kiểu Bánh</td>
				 				<td>
				 					<select name="type" >
				 						<option value="hộp"
										@if($sanpham->unit ==='hộp')
										{{'selected'}}
										@endif
				 						>Hộp</option>
				 						<option value="cái"
										@if($sanpham->unit ==='cái')
										{{'selected'}}
										@endif
				 						>Cái</option>
				 				
				 					</select>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Sản Phẩm Mới</td>
				 				<td>
				 					<input type="radio" name="new" value="1" 
									@if($sanpham->new ==1)
									{{'checked'}}
									@endif
				 					>Có
				 					<input type="radio" name="new" value="0"
				 					@if($sanpham->new ==0)
									{{'checked'}}
									@endif
				 					> Không 


				 				</td>
				 			</tr>
				 			<tr>
				 				<td colspan="" rowspan="" headers=""></td>
				 				<td colspan="" rowspan="" headers="">
				 					<button type="submit">Sửa Sản Phẩm</button>
				 				</td>
				 			</tr>
				 		</table>
				 		{{ csrf_field() }}
				 	</form>
				 </div>
			</div>
		</div>
@endsection