@extends('admin.index')
@section('content')
	<div class="col-sm-10" style="">
			<div class="col-sm-12">
				<h2 class="page-header"> Thêm Slide
					
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

				 	<form class="formthemloaibanh" action="admin/slide/add" method="POST" enctype="multipart/form-data">
				 		<label for="">Link</label>
				 		<input type="text" name="link" style="margin-left: 69px"><br><br>
				 		<label for="" style="margin-right: 34px">Hình ảnh</label>
				 		<input type="file" name="image"><br><br>
				 		<button type="submit">Thêm Slide</button>
				 		{{ csrf_field() }}
				 	</form>
				 </div>
			</div>
		</div>
@endsection