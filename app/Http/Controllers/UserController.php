<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function getList(){
    	$user = User::all();
    	return view('adminlayout.user.list',['user'=>$user]);
    }
    public function getAdd(){
    	return view('adminlayout.user.add');
    }
    public function postAdd(Request $request){
    	$this->validate($request,
            [
                'name'=>'required|min:3|max:100',
                'email'=>'required|email|unique:users,email',
                'pass'=>'required|min:3|max:31',
                'passAgain'=>'required|same:pass',
                'phone'=> 'numeric',
                'address'=>'required',

            ],
            [
                'name.required'=>'Bạn chưa nhập họ tên',
                'name.min'=>'Họ tên phải có độ dài từ 3 đến 100 ký tự',
                'name.max'=>'Họ Tên phải có độ dài từ 3 đến 100 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng emal',
                'email.unique'=>'Email đã tồn tại',
                'pass.required'=>'Bạn chưa nhập mật khẩu',
                'pass.min'=>'Mật khẩu phải có độ dài từ 3 đến 100 ký tự',
                'pass.max'=>'Mật khẩu phải có độ dài từ 3 đến 100 ký tự',
                'passAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passAgain.same'=>'Mật khẩu nhập lại chưa đúng',
                'phone.numeric'=>"số điện thoại phải là số",
                'address.required'=>"Bạn chưa nhập địa chỉ",
            ]);

       $user =  new User;
       $user->full_name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->pass); 
       $user->phone = $request->phone;
       $user->address = $request->address;
       $user->quyen = $request->chucnang;

       $user->save();

       return redirect('admin/user/add')->with('thongbao','Bạn đã thêm  thành công');
    }
    public function getEdit($id){
    	$user = User::find($id);
    	return view('adminlayout/user/edit',['user'=>$user]);
    }
    public function postEdit(Request $request,$id){
    	$this->validate($request,
    		[
    			'name'=>'required|min:3|max:100',
		        'email'=>'required|email|unique:users,email,'.$id,
		        'phone'=> 'numeric',
		        'address'=>'required',
    		]
    		,[
    			'name.required'=>'Bạn chưa nhập họ tên',
                'name.min'=>'Họ tên phải có độ dài từ 3 đến 100 ký tự',
                'name.max'=>'Họ Tên phải có độ dài từ 3 đến 100 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng emal',
                'email.unique'=>'Email đã tồn tại',
                'phone.numeric'=>"số điện thoại phải là số",
                'address.required'=>"Bạn chưa nhập địa chỉ",
    		]);
    		$user = User::find($id);
    		$user->full_name = $request->name;
       		$user->email = $request->email;
       		$user->phone = $request->phone;
	        $user->address = $request->address;
	        $user->quyen = $request->chucnang;

	        if($request->check == 'on'){
	        	$this->validate($request,
	        		[
	        			'pass'=>'required|min:3|max:31',
                		'passAgain'=>'required|same:pass',
	        		],
	        		[
	        			'pass.required'=>'Bạn chưa nhập mật khẩu',
		                'pass.min'=>'Mật khẩu phải có độ dài từ 3 đến 100 ký tự',
		                'pass.max'=>'Mật khẩu phải có độ dài từ 3 đến 100 ký tự',
		                'passAgain.required'=>'Bạn chưa nhập lại mật khẩu',
		                'passAgain.same'=>'Mật khẩu nhập lại chưa đúng',
	        		]);
	        	 $user->password = bcrypt($request->pass); 
	        }
	        $user->save();
	         return redirect('admin/user/list')->with('thongbao','Bạn đã sửa  thành công');

    }
    public function getDelete($id){
    	$user = User::find($id);
    	$user->delete();
    	 return redirect('admin/user/list')->with('thongbao1','Bạn đã xóa thành công');
    }

    //dang nhap admin
    public function dangnhap(){
    	return view('adminlayout.login');
    }
    public function postdangnhap(Request $request){
    	$this->validate($request,
            [
                'email'=>'required|email',
                'pass'=>'required|min:3|max:31',
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng emal',
                'pass.required'=>'Bạn chưa nhập mật khẩu',
                'pass.min'=>'Mật khẩu phải có độ dài từ 3 đến 100 ký tự',
                'pass.max'=>'Mật khẩu phải có độ dài từ 3 đến 100 ký tự',
            ]);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->pass])){
    		if(Auth::user()->quyen == 1 || Auth::user()->quyen == 2){
    			return redirect('admin/loaibanh/list');
    		}else{
    			return redirect('trangchu');
    		}
    		
    	}else{
    		return redirect('admin/dangnhap')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
    	}
    }
    public function dangxuat(){
    	Auth::logout();
    	return redirect('admin/dangnhap');
    }

}
