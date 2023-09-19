<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget ultricies aliquam, quam libero ultricies nunc',
                'post_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
            ],
            [
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl eget ultricies aliquam, quam libero ultricies nunc',
                'post_id' => 1,
                'user_id' => 2,
                'created_at' => now(),
            ]
        ];
        DB::table('comments')->insert($data);
    }
}
