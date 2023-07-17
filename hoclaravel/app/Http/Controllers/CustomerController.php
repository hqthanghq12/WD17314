<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public  function list_customer(Request $request){
//        dd($request);
//        if(isset($_GET['id'])){
//            echo $_GET['id'];
//        }
//        print_r($request->post());
        $title = 'List Customer';
//        truy vấn
//        $listCustomer = DB::table('customer')->get();
//        // kiểm tra xem có bấn nút k
//        if($request->post() && $request->searchCustomer ){
//            $listCustomer = DB::table('customer')
//                            ->where('name', 'like', '%'.$request->searchCustomer.'%')
//                            ->get();
//        }
//        truy vấn bằng model
        $customer = new Customer();
        $listCustomer = $customer::all();
        if($request->post() && $request->searchCustomer ){
            $listCustomer = $customer::where('name', 'like', '%'.$request->searchCustomer.'%')->get();
        }
        return view('customer.list', compact('title', 'listCustomer'));
    }
//    tạo 1 hàm dùng để thêm
//      Cho hàm hiển thị form thêm
// viết route cho hàm trên
    public function  add(Request $request){
        $title = 'Add Customer';
//        Hien thi ra view
//        b1: php artisan make:request tênfile
        return view('customer.add', compact('title'));
    }
}
