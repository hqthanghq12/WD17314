<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
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
