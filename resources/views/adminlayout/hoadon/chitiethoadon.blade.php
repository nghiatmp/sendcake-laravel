@extends('admin.index')
@section('content')
<div class="col-sm-10" style="">
            <div class="col-sm-12">
                <h2 class="page-header"> Chi Tiết Hóa Đơn
                    
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
                                <th>Số Hóa Đơn</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Gía Tiền</th>
                                <<th colspan="" rowspan="" headers="" scope="">Delete</th>>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitiethoadon as $cthd)
                            <tr class="odd gradeX" align="center">
                                <td >{{$cthd->id_bill}}</td>
                                <td >{{$cthd->product->name}}</td>
                                <td >{{$cthd->quantity}}</td>
                                 <td >{{$cthd->unit_price}}</td>
                                <td class="center"  width=""><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoachitiethoadon/{{$cthd->id}}"> Delete</a></td>
                                
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                 </div>
                 
            </div>
        </div>
@endsection