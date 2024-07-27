<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [

                'name' => 'Loja modelo',
                'username' => 'Loja Shoop',
                'email' => 'lojashoop@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('123456'),
            ],
            [

                'name' => 'Vendedor vendor',
                'username' => 'vendor',
                'email' => 'vendedor@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('123456'),
            ],
            [

                'name' => 'Cliente user',
                'username' => 'user',
                'email' => 'cliente@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('123456'),
        ]
      ]);
    }
}
