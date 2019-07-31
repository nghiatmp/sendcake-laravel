<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bill;
use App\BillDetail;

class HoaDonController extends Controller
{
    public function getHoaDon(){
    	$hoadon = Bill::all();
    	return view('adminlayout.hoadon.hoadon',['hoadon'=>$hoadon]);
    }
    public function getChiTietHoaDon($id){
    	$chitiethoadon = BillDetail::where('id_bill',$id)->get();
    	return view('adminlayout.hoadon.chitiethoadon',['chitiethoadon'=>$chitiethoadon]);
    }
    public function getXoaChiTietHoaDon($id){
    	$chitiethoadon = BillDetail::find($id);
    	$chitiethoadon->delete();

    	return redirect('admin/hoadon/chitiethoadon/'.$chitiethoadon->id_bill)->with('thongbao','Bạn đã xóa thành công một sản phẩm');
    }
    public function getdelete($id){
    	$hoadon = Bill::find($id);
    	$hoadon->billdetail()->delete();
    	$hoadon->delete();
    	return redirect('admin/hoadon/hoadonlist')->with('thongbao','Bạn đã xóa thành công một hóa đơn');
    }
}
