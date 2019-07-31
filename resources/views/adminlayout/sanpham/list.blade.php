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
                                <th>Tên Bánh</th>
                                <th>Loại Bánh</th>
                                <th>Gía Tiền</th>
                                <th>Giam Giá</th>
                                <th>Hình Anh</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $sp)
                            <tr class="odd gradeX" align="center">
                                <td width="">{{$sp->id}}</td>
                                <td  width="">{{$sp->name}}</td>
                                <td  width="">{{$sp->type_product->name}}</td>
                                <td  width="">{{$sp->unit_price}}</td>
                                <td  width="">{{$sp->promotion_price}}</td>
                                <td width="">
                                    <img width="150" src="source/image/product/{{$sp->image}}" alt="">
                                </td>
                                <td class="center"  width=""><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/delete/{{$sp->id}}"> Delete</a></td>
                                <td class="center"  width=""><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/edit/{{$sp->id}}">Edit</a></td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center">
                      {{--   {{$sanpham->links()}} --}}
                      {{$sanpham->appends(Request::all())->links()}}
                    </div>
                 </div>
                 
            </div>
        </div>
@endsection