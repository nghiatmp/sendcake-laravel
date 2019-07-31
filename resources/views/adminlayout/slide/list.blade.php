@extends('admin.index')
@section('content')
	<div class="col-sm-10" style="">
			<div class="col-sm-12">
				<h2 class="page-header"> Danh Sách Slide
					
				</h2>
				 <div class="col-sm-12">
				 	@if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
				 	<table id="example" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Hinh Anh</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($slide as $sl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sl->id}}</td>
                                <td>
                                	<img width="200" src="source/image/slide/{{$sl->image}}" alt="">
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/{{$sl->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$sl->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                                          
                        </tbody>
                    </table>
				 </div>
				 
			</div>
		</div>
@endsection