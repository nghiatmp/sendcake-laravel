@extends('admin.index')
@section('content')
	<div class="col-sm-10" style="">
			<div class="col-sm-12">
				<h2 class="page-header"> Sửa Slide
					
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

				 	<form class="formthemloaibanh" action="admin/slide/edit/{{$slide->id}}" method="POST" enctype="multipart/form-data">
				 		<label for="">Link</label>
				 		<input type="text" name="link" style="margin-left: 69px" value="{{$slide->link}}"><br><br>
				 		<label for="">Hình ảnh cũ</label>
				 		<img width="200" src=" source/image/slide/{{$slide->image}}" alt="" style="margin-left: 15px"><br><br>
				 		<label for="" style="margin-right: 34px">Hình ảnh</label>
				 		<input type="file" name="image"><br><br>
				 		<button type="submit">Sửa Slide</button>
				 		{{ csrf_field() }}
				 	</form>
				 </div>
			</div>
		</div>
@endsection