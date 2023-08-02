<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResoure;
use App\Models\Customer;
use Illuminate\Http\Request;

class ApiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // lấy ra toàn bộ danh danh sách
        $customer = Customer::all();
//        Trả về danh sách dưới dạng json
        return CustomerResoure::collection($customer);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //tao khách hàng mới
        $customer = Customer::create($request->all());
//        trả về thông vừa thêm
        return new CustomerResoure($customer);
    }

    /**
     * Display the specified resource.
     */
//    Hiển thị sửa
    public function show(string $id)
    {
        //
        $customer = Customer::find($id);
        if($customer){
            return new CustomerResoure($customer);
        }else{
            return  response()->json(['message'=>'Khách hàng không tại'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $customer = Customer::find($id);
        if($customer){
            $customer->update($request->all());
        }else{
            return  response()->json(['message'=>'Khách hàng không tại'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = Customer::find($id);
        if($customer){
            $customer->delete();
            return  response()->json(['message'=>'Xóa thành công'], 280);
        }else{
            return  response()->json(['message'=>'Khách hàng không tại'], 404);
        }
    }
}
