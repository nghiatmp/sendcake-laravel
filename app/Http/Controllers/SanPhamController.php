<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

class SanPhamController extends Controller
{
   public function getlist(){
   	 $sanpham = Product::orderBy('id','asc')->paginate(5);
     return view('adminlayout.sanpham.list',['sanpham'=>$sanpham]);
   }
   public function getadd(){
   	$loaibanh = ProductType::all();
   	return view('adminlayout.sanpham.add',['loaibanh'=>$loaibanh]);
   }
   public function getpost(Request $request){
   		$this->validate($request,
   			[
   				'name'=>'required|min:3|max:100|unique:products,name',
    			'des'=>'required|min:3|max:100',
    			'unit'=>'required|numeric',
    			'promotion'=>'required|numeric',
    			
   			],
   			[
   				'name.required'=>'Bạn chưa nhập tên loại bánh',
    			'name.min'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
    			'name.max'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
   				'des.required'=>'Bạn chưa nhập miêu tả bánh',
    			'des.min'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    			'des.max'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    			'unit.required'=>'Bạn chưa nhập giá bánh',
    			'unit.numeric'=>'Gía bánh phải là số',
    			'promotion.required'=>'Bạn chưa nhập giá bánh',
    			'promotion.numeric'=>'Gía bánh phải là số',

   			]);

   		$sanpham = new Product;
   		$sanpham->name = $request->name;
   		$sanpham->description = $request->des;
   		$sanpham->id_type = $request->loaibanh;
   		$sanpham->unit_price = $request->unit;
   		$sanpham->promotion_price = $request->promotion;
   		$sanpham->unit = $request->type;
   		$sanpham->new = $request->new;

   		if($request->hasFile('image')){
   			$file =$request->file('image');
   			$duoi = $file->getClientOriginalExtension();
   			if($duoi != 'jpg' && $duoi !='png'){
   				return redirect('admin/sanpham/add')->with('loi','File hình ảnh phải có duôi jpg hoặc png');
   			}
   			$name = $file->getClientOriginalName();
   			$Hinh = str_random(4)."_".$name;
   			while (file_exists("source/image/product".$Hinh)) {
   				$Hinh = str_random(4)."_".$name;
   			}
   			$file->move('source/image/product',$Hinh);
   			$sanpham->image=$Hinh;
   		}else{
   			return redirect('admin/sanpham/add')->with('loi2','Bạn chưa chọn file ảnh');
   		}

   		$sanpham->save();


   		return redirect('admin/sanpham/add')->with('thongbao','Bạn thêm bánh thành công');
   }
   public function getedit($id){
   		$loaibanh = ProductType::all();
   		$sanpham = Product::find($id);
   		return view('adminlayout.sanpham.edit',['sanpham'=>$sanpham,'loaibanh'=>$loaibanh]);
   }
   public function postedit(Request $request,$id){
   		$this->validate($request,
   			[
   				'name'=>'required|min:3|max:100|unique:products,name,'.$id,
    			'des'=>'required|min:3|max:100',
    			'unit'=>'required|numeric',
    			'promotion'=>'required|numeric',
    			
   			],
   			[
   				'name.required'=>'Bạn chưa nhập tên loại bánh',
    			'name.min'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
    			'name.max'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
   				'des.required'=>'Bạn chưa nhập miêu tả bánh',
    			'des.min'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    			'des.max'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    			'unit.required'=>'Bạn chưa nhập giá bánh',
    			'unit.numeric'=>'Gía bánh phải là số',
    			'promotion.required'=>'Bạn chưa nhập giá bánh',
    			'promotion.numeric'=>'Gía bánh phải là số',

   			]);
   		$sanpham = Product::find($id);

   		$sanpham->name = $request->name;
   		$sanpham->description = $request->des;
   		$sanpham->id_type = $request->loaibanh;
   		$sanpham->unit_price = $request->unit;
   		$sanpham->promotion_price = $request->promotion;
   		$sanpham->unit = $request->type;
   		$sanpham->new = $request->new;

   		if($request->hasFile('image')){
   			$file =$request->file('image');
   			$duoi = $file->getClientOriginalExtension();
   			if($duoi != 'jpg' && $duoi !='png'){
   				return redirect('admin/sanpham/edit/'.$sanpham->id)->with('loi','File hình ảnh phải có duôi jpg hoặc png');
   			}
   			$name = $file->getClientOriginalName();
   			$Hinh = str_random(4)."_".$name;
   			while (file_exists("source/image/product".$Hinh)) {
   				$Hinh = str_random(4)."_".$name;
   			}

   			$file->move('source/image/product',$Hinh);
   			if($sanpham->image){
   				unlink('source/image/product/'.$sanpham->image);
   			}
   			$sanpham->image=$Hinh;
   		}
   		$sanpham->save();

   		return redirect('admin/sanpham/edit/'.$sanpham->id)->with('thongbao','Bạn đã sửa hình ảnh thành công');


   }
   public function getdelete($id){
   		$sanpham = Product::find($id);
   		$sanpham->delete();

   		return redirect('admin/sanpham/list')->with('thongbao','Bạn đã xóa sản phẩm thành công');
   }
}
