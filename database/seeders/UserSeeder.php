<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Lê Công Tiến',
            'username' => 'admin',
            'email' => 'congtiendev@gmail.com',
            'phone' => '0965067842',
            'password' => Hash::make('admin'),
            'birthday' => '2003-02-07',
            'address' => 'Tiên Lữ - Hưng Yên',
            'avatar' => 'uploads/avatar/default.png',
            'role' => '1',
            'created_at' => '2023-07-20 00:00:00',
        ]);
        DB::table('users')->insert([
            'fullname' => 'Nguyễn Gia Thái',
            'username' => 'giathaidev',
            'email' => 'giathaidev@gmail.com',
            'phone' => '0123456789',
            'password' => Hash::make('giathaidev'),
            'birthday' => '2003-05-26',
            'address' => 'Thanh Oai - Hà Nội',
            'avatar' => '',
            'role' => '0',
            'created_at' => '2023-07-20 00:00:00',
        ]);
        DB::table('users')->insert([
            'fullname' => 'Nguyễn Công Sơn',
            'username' => 'congsondev',
            'email' => 'congsondev@gmail.com',
            'phone' => '0223456789',
            'password' => Hash::make('congsondev'),
            'birthday' => '2003-03-27',
            'address' => 'Hoài Đức - Hà Nội',
            'avatar' => '',
            'role' => '0',
            'created_at' => '2023-07-20 00:00:00',
        ]);
        DB::table('users')->insert([
            'fullname' => 'Đặng Phương Nam',
            'username' => 'phuongnamdev',
            'email' => 'phuongnamdev@gmail.com',
            'phone' => '0323456789',
            'password' => Hash::make('phuongnamdev'),
            'birthday' => '2003-03-07',
            'address' => 'Kiến Xương - Thái Bình',
            'avatar' => '',
            'role' => '0',
            'created_at' => '2023-07-20 00:00:00',
        ]);

        DB::table('users')->insert([
            'fullname' => 'Phạm Đình Nam',
            'username' => 'namphamdev',
            'email' => 'namphamdev@gmail.com',
            'phone' => '0423456789',
            'password' => Hash::make('namphamdev'),
            'birthday' => '2003-11-27',
            'address' => 'Đan Phượng - Hà Nội',
            'avatar' => '',
            'role' => '0',
            'created_at' => '2023-07-20 00:00:00',
        ]);
    }
}
