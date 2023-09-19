<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class, PostsSeeder::class, CategoriesSeeder::class, BannerSeeder::class, ProjectSeeder::class, ProjectTypeSeeder::class, ProjectImageSeeder::class, CommentSeeder::class
        ]);
    }
}
