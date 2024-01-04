<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'I am Engineer',
                'email'=>'engineer@gmail.com',
                'password'=>bcrypt('123456'),
                'role'=>'engineer',
                'company_name'=>'PT APLIKANUSA LINTASARTA'
            ],
            [
                'name'=>'I am Users',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('1234567'),
                'role'=>'mitra',
                'company_name'=>'BANK JATIM'
            ],
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
