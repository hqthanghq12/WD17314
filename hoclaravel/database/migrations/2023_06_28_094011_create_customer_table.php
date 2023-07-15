<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer', function (Blueprint $table) {
//            id: khóa chính (tăng tự động)
            $table->id();
//            $table->kiểu dữ liệu('tên cột', giới hạn)-> ràng buộc()
            $table->string('name')->nullable();// khong dc bỏ trống
            $table->string('email')->unique(); // Không trùng lặp
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->default(1);// đặt giá trị mặc định
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
