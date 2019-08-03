@extends('admin.index')
@section('content')
<div class="col-sm-10" style="">
            <div class="col-sm-12">
                <h2 class="page-header"> Danh Sách Hóa Đơn
                    
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
                                <th>Tên Khach Hàng</th>
                                <th>Ngày Lập Hóa Đơn</th>
                                <th>Tổng Tiền</th>
                                <th>Hình Thức Thanh Toán</th>
                                <th>Note</th>
                                <th>Delete</th>
                                 <th>Chi Tiết Hóa Đơn</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hoadon as $hd)
                            <tr class="odd gradeX" align="center">
                                <td >{{$hd->id}}</td>
                                <td  >{{$hd->customer->name}}</td>
                                <td  >{{$hd->date_order}}</td>
                                 <td  >{{$hd->total}}</td>
                                <td >
                                   {{$hd->payment}}
                                </td>
                                 <td  >{{$hd->note}}</td>
                                <td class="center"  width=""><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/delete/{{$hd->id}}"> Delete</a></td>
                                <td class="center"  width=""><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/chitiethoadon/{{$hd->id}}"> Chi Tiết Hóa Đơn</a></td>
                                
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                 </div>
                  <div  class="col-sm-12 mt-20" style="text-align: center">
                        {{$hoadon->links()}}
                    </div>
                 
            </div>
        </div>
@endsection