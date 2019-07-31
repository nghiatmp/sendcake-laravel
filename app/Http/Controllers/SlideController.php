<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getList(){
    	$slide = Slide::all();
    	return view('adminlayout.slide.list',['slide'=>$slide]);
    }
    public function getAdd(){
    	return view('adminlayout.slide.add');
    }
    public function postAdd(Request $request){
    	$this->validate($request,
    		[
    			'link'=>'required',
    		],
    		[
    			'link.required'=>'Bạn chưa nhập link',
    		]);
    	$slide = new Slide;
    	$slide->link = $request->link;
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png'){
    			return redirect('admin/slide/add')->with('loi','File hình ảnh không đúng định dạng');
    		}
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(4).'_'.$name;
    		while (file_exists($hinh)) {
    			$hinh = str_random(4).'_'.$name;
    		}
    		$file->move('source/image/slide',$hinh);
    		$slide->image = $hinh;
    	}else{
    		return redirect('admin/slide/add')->with('loi2','Bạn chưa chọn hình ảnh');
    	}
    	$slide->save();

    	return redirect('admin/slide/add')->with('thongbao','Bạn đã thêm Slide thành công');
    }
    //edit
    public function getEdit($id){
    	$slide= Slide::find($id);
    	return view('adminlayout.slide.edit',['slide'=>$slide]);
    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
    		[
    			'link'=>'required',
    		],
    		[
    			'link.required'=>'Bạn chưa nhập link',
    		]);
    	$slide = Slide::find($id);
    	$slide->link = $request->link;
    	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi != 'png'){
    			return redirect('admin/slide/add')->with('loi','File hình ảnh không đúng định dạng');
    		}
    		$name = $file->getClientOriginalName();
    		$hinh = str_random(4).'_'.$name;
    		while (file_exists($hinh)) {
    			$hinh = str_random(4).'_'.$name;
    		}

    		$file->move('source/image/slide',$hinh);
    		if($slide->image){
    			unlink('source/image/slide/'.$slide->image);
    		}

    		$slide->image = $hinh;
    	}
    	$slide->save();

    	return redirect('admin/slide/edit/'.$slide->id)->with('thongbao','Bạn đã sửa Slide thành công');

    }
    public function getDelete($id){
    	$slide= Slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/list')->with('thongbao','Bạn đã xóa Slide thành công');
    }
}
