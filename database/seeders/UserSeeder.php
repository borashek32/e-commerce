<?php

namespace Database\Seeders;

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
//        Admin
        DB::table('users')->insert([
        [
            'full_name' => 'Nataly Zueva',
            'username'  => 'admin',
            'email'     => 'borashek@inbox.ru',
            'password'  => Hash::make('111'),
            'role'      => 'admin',
            'status'    => 'active',
        ],

//        Vendor
        [
            'full_name' => 'Vadim Vendor',
            'username'  => 'vadim',
            'email'     => 'vadim@inbox.ru',
            'password'  => Hash::make('222'),
            'role'      => 'vendor',
            'status'    => 'active',
        ],
//            Customer
        [
            'full_name' => 'Polina Customer',
            'username'  => 'polina',
            'email'     => 'polina@inbox.ru',
            'password'  => Hash::make('333'),
            'role'      => 'customer',
            'status'    => 'active',
        ]
        ]);
    }
}
