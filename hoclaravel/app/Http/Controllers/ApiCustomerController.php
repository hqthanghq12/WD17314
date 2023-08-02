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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
