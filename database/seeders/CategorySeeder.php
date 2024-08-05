<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'names' => "Điện thoại",
                'icon' => "Phone-128x129.webp",
                'location' => "1",
                'alias' => "dien-thoai",
                'status' => "1",
                'classify' => "1",
            ],
            [
                'names' => "Pc",
                'icon' => "Manhinhmaytinh-128x129.webp",
                'location' => "2",
                'alias' => "pc",
                'status' => "1",
                'classify' => "2",
            ],
            [
                'names' => "Laptop",
                'icon' => "Laptop-129x129.webp",
                'location' => "3",
                'alias' => "laptop",
                'status' => "1",
                'classify' => "3",
            ],
            [
                'names' => "Taplet",
                'icon' => "tablet-128x129-2.webp",
                'location' => "4",
                'alias' => "taplet",
                'status' => "1",
                'classify' => "4",
            ],
            [
                'names' => "Đồ Cũ",
                'icon' => "icon-may-cu-60x60.webp",
                'location' => "5",
                'alias' => "do-cu",
                'status' => "1",
                'classify' => "5",
            ],
        ];
        foreach ($categories as $item) {

            DB::table('categories')->insert([
                'names' =>  $item['names'],
                'icon' => $item['icon'],
                'location' => $item['location'],
                'alias' =>$item['alias'],
                'status' => $item['status'],
                'classify' => $item['classify'],
            ]);
        }
    }
}
