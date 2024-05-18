<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'role'=>'admin',
            'email'=>'admin123@gmail.com',
            'password'=>Hash::make('admin123')
        ]);
        User::create([
            'name'=>'User',
            'role'=>'user',
            'email'=>'user123@gmail.com',
            'password'=>Hash::make('user1234')
        ]);
    }
}
