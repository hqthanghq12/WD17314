<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustommerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
//        viết lệnh
//        DB::table('customer')->insert([
//            "name"=>"Nguyễn Văn A",
//            "email"=>"trung@gmail.com",
//            "birthday"=>"2004-10-20",
//            "gender"=>1
//        ]);
//        thêm nhiều
        $test = [];
        for($i= 1; $i<=100; $i++){
            $test[] = [
                "name"=>"Nguyễn Văn A",
                "email"=>"trung".$i."@gmail.com",
                "birthday"=>"2004-10-20",
                "gender"=>1
            ];
        }
        DB::table('customer')->insert($test);
    }
}
