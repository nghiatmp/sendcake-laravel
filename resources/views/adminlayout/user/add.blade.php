@extends('admin.index')

@section('content')
	<div class="col-sm-10" style="">
			<div class="col-sm-12">
				<h2 class="page-header"> Thêm Quản Trị Viên
					
				</h2>
				 <div class="col-sm-12">
				 	@if(count($errors) > 0 )
				 		<div class="alert alert-danger">
				 			@foreach($errors->all() as $err)
				 				{{$err}}<br>
				 			@endforeach
				 		</div>
				 	@endif
				 	@if(session('thongbao'))
				 		<div class="alert alert-success">
				 			{{session('thongbao')}}
				 		</div>
				 	@endif
				 	<form class="formthemloaibanh" action="admin/user/add" method="post">
				 		<table class="nhanvien">
				 			<tr>
				 				<td>Tên Nhân Viên</td>
				 				<td>
				 					<input type="text" name="name" placeholder="Nhập họ tên" class="input1">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Emal</td>
				 				<td>
				 					<input type="text" name="email" placeholder="Nhập Email"  class="input1">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Mật Khẩu</td>
				 				<td>
				 					<input type="password" name="pass" placeholder="Nhập Mật Khẩu" class="input1">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Nhập Lại Mật Khẩu</td>
				 				<td>
				 					<input type="password" name="passAgain" placeholder="Nhập Lại Mật Khẩu" class="input1">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Số Điện Thoại</td>
				 				<td>
				 					<input type="text" name="phone" placeholder="Nhập SDT" class="input1">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Địa Chỉ</td>
				 				<td>
				 					<input type="text" name="address" placeholder="Nhập Địa Chỉ" class="input1">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>Chức Năng</td>
				 				<td>
				 					<input type="radio" name="chucnang" value="2" checked="">Admin
				 					<input type="radio" name="chucnang" value="1"> Quản Trị Viên
				 					<input type="radio" name="chucnang" value="0"> Thành Viên

				 				</td>
				 			</tr>
				 			<tr>
				 				<td colspan="" rowspan="" headers=""></td>
				 				<td colspan="" rowspan="" headers="">
				 					<button type="submit">Thêm QTV</button>
				 				</td>
				 			</tr>
				 		</table>
				 		{{ csrf_field() }}
				 	</form>
				 </div>
			</div>
		</div>
@endsection