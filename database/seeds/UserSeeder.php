<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name'=>'admin',
            'email'=>'admin@test.com',
            'password'=> Hash::make('admin'),
            'is_admin'=>1
        ]);
        DB::table('users')->insert([
            'name'=>'user',
            'email'=>'user@test.com',
            'password'=> Hash::make('user'),
            'is_admin'=>0
        ]);
    }
}
