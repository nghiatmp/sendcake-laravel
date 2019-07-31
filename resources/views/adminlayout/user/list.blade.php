@extends('admin.index')
@section('content')
<div class="col-sm-10" style="">
            <div class="col-sm-12">
                <h2 class="page-header"> Danh Sách Người Dùng
                    
                </h2>
                 <div class="col-sm-12">
                    @if(session('thongbao1'))
                        <div class="alert alert-success">
                            {{session('thongbao1')}}
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table id="example" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Số DT</th>
                                <th>Địa Chỉ</th>
                                <th>Quyền</th>
                                @if(Auth::user()->quyen == 2)
                                    <th>Delete</th>
                                    <th>Edit</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $us)
                            <tr class="odd gradeX" align="center">
                                <td width="">{{$us->id}}</td>
                                <td  width="">{{$us->full_name}}</td>
                                <td  width="">{{$us->email}}</td>
                                <td  width="">{{$us->phone}}</td>
                                <td  width="">{{$us->address}}</td>
                                <td  width="">
                                    @if($us->quyen == 0) {{'Thành Viên'}}
                                    @elseif($us->quyen == 1) {{'Quản Trị Viên'}}
                                    @else {{'Boss'}}
                                    @endif
                                </td>
                                 @if(Auth::user()->quyen == 2)
                                <td class="center"  width=""><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$us->id}}"> Delete</a></td>
                                <td class="center"  width=""><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$us->id}}">Edit</a></td>
                                @endif
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                 </div>
                 
            </div>
        </div>
@endsection