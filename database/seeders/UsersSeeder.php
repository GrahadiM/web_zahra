<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();
        $user = [
            [
                'id' => '1',
                'name' => 'Admin',
                'role' => 'admin',
                'status' => 'active',
                'gender' => '-',
                'phone' => '-',
                'avatar' => 'admin.png',
                'saldo' => 0,
                'email' => 'admin@test.com',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'email_verified_at' => '2021-07-09 20:19:13',
            ],
            [
                'id' => '2',
                'name' => 'Operator',
                'role' => 'operator',
                'status' => 'active',
                'gender' => 'Pria',
                'phone' => '085767113554',
                'avatar' => 'operator.png',
                'saldo' => 0,
                'email' => 'operator@test.com',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'email_verified_at' => '2021-07-09 20:19:13',
            ],
            [
                'id' => '3',
                'name' => 'Outlet',
                'role' => 'outlet',
                'status' => 'non-active',
                'gender' => 'Pria',
                'phone' => '085767113554',
                'avatar' => 'outlet.png',
                'saldo' => 0,
                'email' => 'outlet@test.com',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'email_verified_at' => '2021-07-09 20:19:13',
            ],
        ];
        
        foreach ($user as $key => $value) {
           \App\Models\User::create($value);
        }
    }
}
