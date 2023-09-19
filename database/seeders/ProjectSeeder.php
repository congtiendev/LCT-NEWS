<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectType;
use Illuminate\Support\Facades\DB;


class ProjectSeeder extends Seeder
{


    public function run(): void
    {
        $data = [
            [
                'project_name' => 'Project 1',
                'slug' => 'project-1',
                'description' => 'This is the description of Project 1.',
                'investor' => 'Investor A',
                'address' => '123 ABC Street, XYZ City',
                'price' => 150000,
                'area' => 200,
                'location' => 'City Center',
                'room_count' => 3,
                'project_type_id' => 1,
                'sale_method' => 1, // '1: Bán, 2: Cho thuê
                'author_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_name' => 'Project 2',
                'slug' => 'project-2',
                'description' => 'This is the description of Project 2.',
                'investor' => 'Investor B',
                'address' => '456 XYZ Street, ABC City',
                'price' => 200000,
                'area' => 300,
                'location' => 'Suburb',
                'room_count' => 4,
                'project_type_id' => 2,
                'sale_method' => 2,
                'author_id' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_name' => 'Project 3',
                'slug' => 'project-3',
                'description' => 'This is the description of Project 3.',
                'investor' => 'Investor C',
                'address' => '789 XYZ Street, ABC City',
                'price' => 300000,
                'area' => 400,
                'location' => 'Downtown',
                'room_count' => 5,
                'project_type_id' => 1,
                'sale_method' => 1,
                'author_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_name' => 'Project 4',
                'slug' => 'project-4',
                'description' => 'This is the description of Project 4.',
                'investor' => 'Investor D',
                'address' => '555 PQR Street, LMN City',
                'price' => 180000,
                'area' => 250,
                'location' => 'Outskirts',
                'room_count' => 2,
                'project_type_id' => 3,
                'sale_method' => 2,
                'author_id' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_name' => 'Project 5',
                'slug' => 'project-5',
                'description' => 'This is the description of Project 5.',
                'investor' => 'Investor E',
                'address' => '999 LMN Street, XYZ City',
                'price' => 250000,
                'area' => 350,
                'location' => 'City Center',
                'room_count' => 4,
                'project_type_id' => 2,
                'sale_method' => 1,
                'author_id' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('projects')->insert($data);
    }
}
