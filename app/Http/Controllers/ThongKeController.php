<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\BillDetail;
use App\Product;
use DB;
use Carbon;
class ThongKeController extends Controller
{
    public function getthongke(){
        $range = Carbon\Carbon::now()->subYears(5);
        $year = DB::table('bills')->select(DB::raw('YEAR(created_at) as Nam'),DB::raw('Count(*) as SoHd'))->where('created_at','>=',$range)->groupBy('Nam')->get();

        // $year1 =  json_decode($year);
      
        return view('adminlayout.thongke.thongke',['year1'=>$year]);
    }
    public function getthongkesp(){
        $range = Carbon\Carbon::now()->subYears(5);
        $year = DB::table('bill_detail')->select(DB::raw('year(created_at) as year'),DB::raw('Count(*) as SP'))->where('created_at','>=',$range)->groupBy('year')->get();

        return view('adminlayout.thongke.thongkesp1nam',['year'=>$year]);
    }
    public function getthongkeloaibanh(){
        $range = Carbon\Carbon::now()->subYears(5);
        $loaibanh = DB::table('bill_detail')->join('products','bill_detail.id_product','=','products.id')->join('type_products','products.id_type','=','type_products.id')->select('type_products.name as name',DB::raw('Count(*) as y'))->groupBy('type_products.name')->where('bill_detail.created_at','>=',$range)->get();

        return view('adminlayout.thongke.thongkeloaibanh',['loaibanh'=>$loaibanh]);
    }
    public function getthongketienthang(){
        $money = DB::table('bills')->select(DB::raw('month(created_at) as month'),DB::raw('SUM(total) as sum'))->groupBy("month")->whereYear('created_at','2019')->get();
        return view('adminlayout.thongke.tongtienthang',['money'=>$money]);
    }
}
