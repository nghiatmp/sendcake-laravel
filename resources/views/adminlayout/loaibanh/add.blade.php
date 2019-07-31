@extends('admin.index')
@section('content')
	<div class="col-sm-10" style="">
			<div class="col-sm-12" style="">
			<div class="col-sm-12">
				<h2 class="page-header"> Thêm Loại Bánh
					
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
				 	@if(session('thongbao'))
				 		<div class="alert alert-success">
				 			{{session('thongbao')}}
				 		</div>
				 	@endif
				 	<form class="formthemloaibanh" action="admin/loaibanh/add" method="post" enctype="multipart/form-data">
				 		<table class="nhanvien">
				 			<tr>
				 				<td>Tên Loại Bánh</td>
				 				<td>
				 					<input type="text" name="name" placeholder="Nhập Tên Loại Bánh" class="input1">
				 				</td>
				 			</tr>
				 			
				 			<tr>
				 				<td>Miêu Tả</td>
				 				<td>
				 					<textarea  id="demo" name="description" class="ckeditor"></textarea>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Hình Anh</td>
				 				<td>
				 					<input type="file" name="image" class="input1">
				 				</td>
				 			</tr>
				 			
				 			<tr>
				 				<td></td>
				 				<td>
				 					<button type="submit">Thêm Loại Bánh</button>
				 				</td>
				 			</tr>
				 		</table>
				 		{{ csrf_field() }}
				 	</form>
				 </div>
			</div>
		</div>
		</div>
@endsection