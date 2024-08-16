<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->insert([
            //admin
            [
                'name'     => 'Marcos Leite',
                'username' => 'mleite',
                'email'    => 'marcosleitelopes@gmail.com',
                'role'     => 'admin',
                'status'   => 'active',
                'password' => bcrypt('12345678'),
            ],
            //user
            [
                'name'     => 'Cliente user',
                'username' => 'user',
                'email'    => 'marcelarocha@gmail.com',
                'role'     => 'user',
                'status'   => 'active',
                'password' => bcrypt('12345678'),
            ],
            //vendor
            [
                'name'     => 'Vendedor vendor',
                'username' => 'vendor',
                'email'    => 'luizarocha@gmail.com',
                'role'     => 'vendor',
                'status'   => 'active',
                'password' => bcrypt('12345678'),
            ],
        ]);
    }
}
