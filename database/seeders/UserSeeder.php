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
            'password'  => Hash::make('11111111'),
            'role'      => 'admin',
            'status'    => 'active',
        ],

//        Vendor
        [
            'full_name' => 'Vadim Seller',
            'username'  => 'vadim',
            'email'     => 'borashek88@gmail.com',
            'password'  => Hash::make('22222222'),
            'role'      => 'vendor',
            'status'    => 'active',
        ],
//            Customer
        [
            'full_name' => 'Polina Customer',
            'username'  => 'polina',
            'email'     => 'polina@inbox.ru',
            'password'  => Hash::make('33333333'),
            'role'      => 'customer',
            'status'    => 'active',
        ]
        ]);
    }
}
