<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
    public function  add(CustomerRequest $request){
        $title = 'Add Customer';
//        Hien thi ra view
//        b1: php artisan make:request tênfile
//        Xử lý thêm
//        Xử lý ảnh
            if($request->isMethod('POST')){
//                dd($request->hasFile('image'
                if($request->hasFile('image') && $request->file('image')->isValid()){
                    $request->image = uploadFile('hinh', $request->file('image'));
                }

                $params = $request->except('_token', 'image');
                $params['hinh'] = $request->image;

                $customer = Customer::create($params);

                if($customer->id){
                    Session::flash('success', 'Thêm khách hàng thành công');
                }

            }



        return view('customer.add', compact('title'));
    }
    public  function  edit(CustomerRequest $request, $id){
        $title = 'Edit Customer';
//        cách 1
            $customer = DB::table('customer')
                ->where('id', $id)->first();
//            Code update
        if($request->isMethod('POST')){// check xem có post hay không
            $params = $request->except('_token', 'image');
            if($request->hasFile('image') && $request->file('image')->isValid()){
//                Xóa ảnh cũ khi có thực hiện post ảnh mới
                $resultDL = Storage::delete('/public/'.$customer->hinh);
                if($resultDL){
                    $request->image = uploadFile('hinh', $request->file('image'));
                    $params['hinh'] =  $request->image;
                }
            }else{
//                nếu không thay hình thì ảnh sẽ là ảnh cũ
                $params['hinh'] = $customer->hinh;
            }
            $result = Customer::where('id', $id)->update($params);
            if($result){
                Session::flash('success', 'Sửa khách hàng thành công');
//                chuyển trang sau khi thành công
                return redirect()->route('edit-customer', ['id'=>$id]);
            }

        }
        return view('customer.edit', compact('title', 'customer'));
    }
    public function delete(Request $request, $id){
        $customerDL = Customer::where('id', $id)->delete();
        if($customerDL){
            Session::flash('success', 'Xóa khách hàng thành công');
//                chuyển trang sau khi thành công
            return redirect()->route('list');
        }
    }
}
