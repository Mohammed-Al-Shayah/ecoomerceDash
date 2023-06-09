<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'name' => 'mohammedalshayah',
            'email' => 'mohammedalshayah@gmail.com',
            'password' => Hash::make('123456789'),
            'type'=>'admin',
            'email_verified_at'=>now(),
        ]);


    }
}
