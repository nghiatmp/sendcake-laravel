<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Cart;
use Session;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{

	//view share:
	// public function __construct(){
		
	// }
    public function __construct(){
         // if(Session('cart')){
         //    $oldCart = Session::get('cart');
         //    $cart = new Cart($oldCart);
         //    view::share(['cart'=>Session::get('cart'),'productcart'=>$cart->items,'totalPrice'=>$cart->$totalPrice,'totalQty'=>$cart->$totalQty]);
         // }

        $loaisanpham = ProductType::all();
        view::share(['loaisanpham'=>$loaisanpham]);
    }

    public function getMaster(){
    	$slide=Slide::orderBy('id','desc')->take(3)->get();
    	$sanphamnew = Product::where('new',1)->paginate(8);
    	$sanphamkhuyenmai = Product::where('promotion_price',"<>",0)->paginate(8);
    	return view('pages.trangchu',['slide'=>$slide,'sanphamnew'=>$sanphamnew,'sanphamkhuyenmai'=>$sanphamkhuyenmai]);
    }
   
    public function  getLienhe(){
    	return view('pages.lienhe');
       
    }
    
    public function  getGioiThieu(){
    	return view('pages.gioithieu');
    }
    public function  getLoaiSp($id){
    	$sanpham = Product::where('id_type',$id)->get();
    	$loaisanpham1 = ProductType::find($id);
    	$spkhac = Product::where('id_type','<>',$id)->paginate(3);
    	return view('pages.loaisanpham',['sanpham'=>$sanpham,'loaisanpham1'=>$loaisanpham1,'spkhac'=>$spkhac]);
    }
    
    public function  getSanPham($id){
    	$sanpham = Product::find($id);
        $splquan = Product::where([['id_type',$sanpham->id_type],['id',"<>",$sanpham->id]])->paginate(3);
    	return view('pages.sanpham',['sanpham'=>$sanpham,'splquan'=>$splquan]);
    }
    public function getAddtocart(Request $request ,$id){
        $product= Product::find($id);
        $oldCart= Session('cart')? Session('cart'): null;
        $cart =  new Cart($oldCart);
        $cart->add($product,$id);
        $request->Session()->put('cart',$cart);
        return redirect('trangchu');
    }
    public function getMuaHang($id){
        $sanpham =Product::find($id);
        Cart::add(['id'=>$id,'name'=>$sanpham->name,'quantity'=>1,'price'=>$sanpham->unit_price,'attributes'=>['img'=>$sanpham->image]]);
        $content =  Cart::getcontent();
        return redirect('cartshop');
    }
    public function getCartshop(){
        $content = Cart::getcontent();
        $total = Cart::getTotal();
        return view('pages.cartshop',['content'=>$content,'total'=>$total]);
       // return redirect('trangchu');
    }
    public function getEditCartshop(){
         if(Request::ajax()){
           // echo "oke";
             $id = Request::get('id');
            //$id = $_GET['id'] ?? '';
             $qty = Request::get('qty');
            //$qty = $_GET['qty'] ?? '';

            
             Cart::update($id,['quantity'=>$qty]);
         }
    }
    public function getXoaCartshop($id){
        Cart::remove($id);
        return redirect('cartshop');
    }
    public function getDatHang(){
        $content = Cart::getcontent();
        $total = Cart::getTotal();
        return view('pages.dathang',['content'=>$content,'total'=>$total]);

    }
    public function getSave(Request $request){
        $content = Cart::getcontent();
        $total = Cart::getTotal();

        if($total != 0 ){
             $this->validate($request,
            [
                'name'=> 'required',
                'email'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'note'=>'required',
            ],
            [
                'name.required'=>'Bạn phải nhập tên của mình',
                'email.required'=>'Bạn phải nhập email của mình',
                'phone.required'=>'Bạn phải nhập email của mình',
                'address.required'=>'Bạn phải nhập địa chỉ của mình',
                'name.note'=>'Bạn phải nhập ghi chu của mình',
            ]);
                $customer =  new Customer;
                $customer->name = $request->name;
                $customer->gender = $request->gender;
                $customer->email = $request->email;
                $customer->address = $request->address;
                $customer->phone_number = $request->phone;
                $customer->note = $request->note;

                $customer->save();

            ////bill
            $bill = new Bill;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $total;
            $bill->payment = $request->payment_method;
            $bill->note = $request->note;

            $bill->save();

            //bill datail
            foreach ($content as $key => $value) {
                $billdetail =  new BillDetail;
                $billdetail->id_bill= $bill->id;
                $billdetail->id_product = $value['id'];
                $billdetail->quantity = $value['quantity'];
                $billdetail->unit_price =$value['price'];


                $billdetail->save();

                Cart::remove("$value[id]");
            }

            return redirect('dathang')->with('thongbao','Bạn đã đặt hàng thành công');

        }else{

            return redirect('dathang')->with('thongbao1','Giỏ hàng của bạn đang trống');
            }
    }

    //dang nhap
    public function getDangnhap(){
        return view('pages.dangnhap');
    }
    public function postDangnhap(Request $request){
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
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao1','Đăng nhập thất bại sai tai khoản hoặc mật khẩu');
        }
    }

    public function getDangki(){
        return view('pages.dangki');
    }
    public function postDangki(Request $request){
       $this->validate($request,
            [
                'name'=>'required|min:3|max:100',
                'email'=>'required|email|unique:users,email',
                'pass'=>'required|min:3|max:31',
                'passAgain'=>'required|same:pass',
                'phone'=> 'numeric',
                'address'=>'required'

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
       $user->quyen = 0;

       $user->save();

       return redirect('dangki')->with('thongbao','Bạn đã đăng kí thành công');
    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    //find

    public function getTimKiem(Request $request){
        $key = $request->timkiem;
        $sanpham = Product::where('name','like',"%$key%")->paginate(8)->appends(['key'=>$key]);
        ///print_r($sanpham);
       return view('pages.timkiem',['sanpham'=>$sanpham,'key'=>$key]);
    }
}
