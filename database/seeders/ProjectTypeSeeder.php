<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectType;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['project_type_name' => 'Nhà đất', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Nhà phố', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Nhà trọ', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Đất nên', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Căn hộ', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Chung cư', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Biệt thự', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Văn phòng', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Cửa hàng', 'created_at' => now(), 'updated_at' => now()],
            ['project_type_name' => 'Kho xưởng', 'created_at' => now(), 'updated_at' => now()]
        ];
        DB::table('project_types')->insert($data);
    }
}
