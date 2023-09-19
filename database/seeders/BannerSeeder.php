<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'image' => 'https://i.pravatar.cc/100',
                'slogan' => 'Sản phẩm mới',
                'link' => 'https://www.facebook.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'https://i.pravatar.cc/100',
                'slogan' => 'Sản phẩm bán chạy',
                'link' => 'https://www.facebook.com',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'https://i.pravatar.cc/100',
                'slogan' => 'Sản phẩm khuyến mãi',
                'link' => 'https://www.facebook.com',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('banners')->insert($data);
    }
}
