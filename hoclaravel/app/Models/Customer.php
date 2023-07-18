<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
//    tro den ten bảng
    protected $table = 'customer';
//    thêm các trường của bảng để add
    protected $fillable=[
        'name',
        'email',
        'birthday',
        'gender',
        'hinh'
    ];

}
