<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => "admin",
                'email' => "admin@gmail.com",
                'password' => md5('123123123'),

        
            ],
            [
               'name' => "khanh hang",
                'email' => "khachhang@gmail.com",
                'password' => md5('123123123'),
            ],
           
        ];
        foreach ($users as $item) {

            DB::table('users')->insert([
                'name' =>  $item['name'],
                'email' => $item['email'],
                'password' => $item['password'],
        
            ]);
        }
    }
}
