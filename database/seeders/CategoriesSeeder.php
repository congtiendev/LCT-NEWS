<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Bất động sản",
                "slug" => "bat-dong-san",
                "created_at" => "2023-07-20 00:00:00",
                "updated_at" => "2023-07-20 00:00:00"
            ],
            [
                "name" => "Cho thuê",
                "slug" => "cho-thue",
                "created_at" => "2023-07-20 00:00:00",
                "updated_at" => "2023-07-20 00:00:00"
            ],
            [
                "name" => "Mua bán",
                "slug" => "mua-ban",
                "created_at" => "2023-07-20 00:00:00",
                "updated_at" => "2023-07-20 00:00:00"
            ],
            [
                "name" => "Tin tức",
                "slug" => "tin-tuc",
                "created_at" => "2023-07-20 00:00:00",
                "updated_at" => "2023-07-20 00:00:00"
            ],
            [
                "name" => "Dự án",
                "slug" => "du-an",
                "created_at" => "2023-07-20 00:00:00",
                "updated_at" => "2023-07-20 00:00:00"
            ]
        ];
        DB::table('categories')->insert($data);
    }
}
