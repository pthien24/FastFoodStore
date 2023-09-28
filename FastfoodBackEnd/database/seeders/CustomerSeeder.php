<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'web addmin',
            'email'=>'admin@gmail.com',
            'username'=>'admin',
            'password'=>bcrypt('123456789'),
            'created_at'=>now(),
        ]);
    }
}
