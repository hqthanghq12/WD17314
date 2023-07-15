<?php

namespace App\Http\Controllers;

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
        $listCustomer = DB::table('customer')->get();
        // kiểm tra xem có bấn nút k
        if($request->post() && $request->searchCustomer ){
            $listCustomer = DB::table('customer')
                            ->where('name', 'like', '%'.$request->searchCustomer.'%')
                            ->get();
        }
        return view('customer.list', compact('title', 'listCustomer'));
    }
}
