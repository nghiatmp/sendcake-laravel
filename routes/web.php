<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('trangchu','PagesController@getMaster');
Route::get('lienhe','PagesController@getLienhe');
Route::get('gioithieu','PagesController@getGioiThieu');
Route::get('loaisanpham/{id}','PagesController@getLoaiSp');
Route::get('sanpham/{id}','PagesController@getSanPham');
Route::get('themgiohang/{id}','PagesController@getAddtocart');
Route::get('muahang/{id}','PagesController@getMuaHang');
Route::get('cartshop','PagesController@getCartshop');
Route::get('xoacartshop/{id}','PagesController@getXoaCartshop');
Route::get('dathang','PagesController@getDatHang');
Route::post('save','PagesController@getSave');


//login
Route::get('dangnhap','PagesController@getDangnhap');
Route::post('dangnhap','PagesController@postDangnhap');
//register
Route::get('dangki','PagesController@getDangki');
Route::post('dangki','PagesController@postDangki');
Route::get('dangxuat','PagesController@getDangXuat');
//tim kiem

Route::get('timkiem','PagesController@getTimKiem');


////giao dien admin
Route::group(['prefix'=>'admin','middleware'=>'adminlog'],function(){
	Route::group(['prefix'=>'loaibanh'],function(){
		//list
		Route::get('list','LoaiBanhController@getlist');
		//add
		Route::get('add','LoaiBanhController@getAdd');
		Route::post('add','LoaiBanhController@postAdd');
		//delete
		Route::get('delete/{id}','LoaiBanhController@getDelete');
		//edit
		Route::get('edit/{id}','LoaiBanhController@getEdit');
		Route::post('edit/{id}','LoaiBanhController@postEdit');
	});
	//slide
	Route::group(['prefix'=>'slide'],function(){
		//list
		Route::get('list','SlideController@getList');

		//add
		Route::get('add','SlideController@getAdd');
		Route::post('add','SlideController@postAdd');
		//edit
		Route::get('edit/{id}','SlideController@getEdit');
		Route::post('edit/{id}','SlideController@postEdit');
		///delete
		Route::get('delete/{id}','SlideController@getDelete');

	});
	//hoadon
	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('hoadonlist','HoaDonController@getHoaDon');
		Route::get('delete/{id}','HoaDonController@getdelete');
		Route::get('chitiethoadon/{id}','HoaDonController@getChiTietHoaDon');
		Route::get('xoachitiethoadon/{id}','HoaDonController@getXoaChiTietHoaDon');
	});
	//sanpham
	Route::group(['prefix'=>'sanpham'],function(){
		//list
		Route::get('list','SanPhamController@getlist');
		//adđ
		Route::get('add','SanPhamController@getadd');
		Route::post('add','SanPhamController@getpost');
		//edit
		Route::get('edit/{id}','SanPhamController@getedit');
		Route::post('edit/{id}','SanPhamController@postedit');

		//delete
		Route::get('delete/{id}','SanPhamController@getdelete');
	});
	Route::group(['prefix'=>'user','middleware'=>'adminlevel'],function(){

		//add
		Route::get('add','UserController@getAdd');
		Route::post('add','UserController@postAdd');
		//edit
		Route::get('edit/{id}','UserController@getEdit');
		Route::post('edit/{id}','UserController@postEdit');
		//delete
		Route::get('delete/{id}','UserController@getDelete');
	});
	//list
	Route::get('user/list','UserController@getList');

});
		
		

//dang nhap admin
Route::get('admin/dangnhap','UserController@dangnhap');
Route::post('admin/dangnhap','UserController@postdangnhap');
Route::get('admin/logout','UserController@dangxuat');




//route test
Route::get('test',function(){
	$mytime = Carbon\Carbon::now()->subYears(10);
	 echo $mytime->toDateTimeString();
});
