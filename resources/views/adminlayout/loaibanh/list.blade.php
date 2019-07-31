@extends('admin.index')
@section('content')
<div class="col-sm-10" style="">
            <div class="col-sm-12">
                <h2 class="page-header"> Danh Sách Bánh
                    
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
                                <th>Tên Loại Bánh</th>
                                <th>Miêu Tả</th>
                                <th>Hình Anh</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaibanh as $lb)
                            <tr class="odd gradeX" align="center">
                                <td width="5%">{{$lb->id}}</td>
                                <td  width="15%">{{$lb->name}}</td>
                                <td  width="40%">{{$lb->description}}</td>
                                <td width="20%">
                                    <img width="150" src="source/image/product/{{$lb->image}}" alt="">
                                </td>
                                <td class="center"  width=""><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaibanh/delete/{{$lb->id}}"> Delete</a></td>
                                <td class="center"  width=""><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaibanh/edit/{{$lb->id}}">Edit</a></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                 </div>
                 
            </div>
        </div>
@endsection