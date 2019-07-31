<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class LoaiBanhConTroller extends Controller
{
    public function getlist(){
    	$loaibanh = ProductType::all();
    	return view('adminlayout.loaibanh.list',['loaibanh'=>$loaibanh]);
    }
    public function getAdd(){
    	return view('adminlayout.loaibanh.add');
    }
    public function postAdd(Request $request){
    	$this->validate($request, 
    		[
    			'name'=>'required|min:3|max:100|unique:type_products,name',
    			'description'=>'required|min:3|max:100',
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên loại bánh',
    			'name.min'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
    			'name.max'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
    			'name.unique'=>'Tên loại bánh đã tồn tại',
    			'description.required'=>'Bạn chưa nhập miêu tả bánh',
    			'description.min'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    			'description.max'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    		]);
    	$loaibanh = new ProductType;
    	$loaibanh->name = $request->name;
    	$loaibanh->description = $request->description;
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png'){
    			return redirect('admin/loaibanh/add')->with('loi','File hình ảnh chưa đúng định dạng');
    		}
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(4).'_'.$name;
    		while (file_exists($hinh)) {
    			$hinh = str_random(4).'_'.$name;
    		}
    		$file->move("source/image/product",$hinh);
    		$loaibanh->image =$hinh ;
    	}else{
    		$loaibanh->image ='';
    	}
    	$loaibanh->save();
    	return redirect('admin/loaibanh/add')->with('thongbao','Bạn đã thêm loại bánh thành công');
    }
    public function getDelete($id){
    	$loaibanh =ProductType::find($id);
        $loaibanh->product()->delete();
    	$loaibanh->delete();
    	return redirect('admin/loaibanh/list')->with('thongbao','Bạn đã xóa loại bánh thành công');
    }
    //edit
    public function getEdit(Request $request ,$id){
    	$loaibanh =ProductType::find($id);
    	return view('adminlayout.loaibanh.edit',['loaibanh'=>$loaibanh]);
    }
    public function postEdit(Request $request,$id){
    	$this->validate($request, 
    		[
    			'name'=>'required|min:3|max:100|unique:type_products,name,'.$id,
    			'description'=>'required|min:3|max:100',
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên loại bánh',
    			'name.min'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
    			'name.max'=>'Tên loại bánh phải dài từ 3 đến 100 Kí Tự',
    			'name.unique'=>'Tên loại bánh đã tồn tại',
    			'description.required'=>'Bạn chưa nhập miêu tả bánh',
    			'description.min'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    			'description.max'=>'Miêu tả bánh bánh phải dài từ 3 đến 100 Kí Tự',
    		]);
    	$loaibanh =ProductType::find($id);
    	$loaibanh->name = $request->name;
    	$loaibanh->description = $request->description;
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png'){
    			return redirect('admin/loaibanh/add')->with('loi','File hình ảnh chưa đúng định dạng');
    		}
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(4).'_'.$name;
    		while (file_exists($hinh)) {
    			$hinh = str_random(4).'_'.$name;
    		}
    		$file->move("source/image/product",$hinh);
    		
    		if($loaibanh->image){
    			unlink("source/image/product/".$loaibanh->image);
    		}
    		$loaibanh->image =$hinh ;
    	}
    	$loaibanh->save();
    	return redirect('admin/loaibanh/list')->with('thongbao','Bạn đã sửa loại bánh thành công');

    }
}
