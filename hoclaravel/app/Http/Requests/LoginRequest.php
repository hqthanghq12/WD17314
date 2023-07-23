<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
//        Lấy phương thức đang hoạt động
        $method = $this->route()->getActionMethod();
        switch ($this->method()){
            case 'POST':
                switch ($method){
                    case 'login': // hàm nào gọi đến
                        $rules = [
                            'email'=> 'required',
                            'password' =>'required'
                        ];
                        break;
                    case 'register': // hàm nào gọi đến
                        $rules = [
                            'name'=>'required',
                            'email'=> 'required:unique:users',
                            'password' =>'required'
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;

        }

        return $rules;
    }
    public function  messages()
    {
        return [
            'name.required'=>'Không được bỏ trống tên',
            'email.required'=>'Không được bỏ trống email',
            'password.required'=>'Không được bỏ trống pass',
            'password.unique'=>'Email này đã đăng ký',

        ];

    }
}
