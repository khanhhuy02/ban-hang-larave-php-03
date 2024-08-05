<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $brands = [
            [
                'categories_id' => "1",
                'names' => "Xiaomi",
                'icon' => "logo-xiaomi-220x48-5.png",
                'location' => "1",
                'alias' => "xiaomi",
                'status' => "1",
            ],
            [
                'categories_id' => "3",
                'names' => "Lenovo",
                'icon' => "logo-lenovo-149x40.png",
                'location' => "1",
                'alias' => "lenovo",
                'status' => "1",
            ],
            [
                'categories_id' => "3",
                'names' => "Acer",
                'icon' => "logo-acer-149x40.png",
                'location' => "2",
                'alias' => "acer",
                'status' => "1",
            ],
            [
                'categories_id' => "3",
                'names' => "Asus",
                'icon' => "logo-asus-149x40.png",
                'location' => "3",
                'alias' => "asus",
                'status' => "1",
            ],
            [
                'categories_id' => "3",
                'names' => "Dell",
                'icon' => "logo-dell-149x40.png",
                'location' => "4",
                'alias' => "dell",
                'status' => "1",
            ],
            [
                'categories_id' => "1",
                'names' => "Iphone",
                'icon' => "logo-iphone-220x48.png",
                'location' => "2",
                'alias' => "iphone",
                'status' => "1",
            ],
            [
                'categories_id' => "3",
                'names' => "Macbook",
                'icon' => "logo-macbook-149x40.png",
                'location' => "6",
                'alias' => "macbook",
                'status' => "1",
            ],

            [
                'categories_id' => "3",
                'names' => "Msi",
                'icon' => "logo-msi-149x40.png",
                'location' => "5",
                'alias' => "msi",
                'status' => "1",
            ],
            [
                'categories_id' => "1",
                'names' => "Nokia",
                'icon' => "Nokia42-b_21.jpg",
                'location' => "3",
                'alias' => "nokia",
                'status' => "1",
            ],
            [
                'categories_id' => "1",
                'names' => "Oppo",
                'icon' => "OPPO42-b_5.jpg",
                'location' => "4",
                'alias' => "oppo",
                'status' => "1",
            ],
            [
                'categories_id' => "1",
                'names' => "Realme",
                'icon' => "Realme42-b_37.png",
                'location' => "5",
                'alias' => "realme",
                'status' => "1",
            ],
            [
                'categories_id' => "1",
                'names' => "Samsung",
                'icon' => "samsungnew-220x48-1.png",
                'location' => "6",
                'alias' => "samsung",
                'status' => "1",
            ],
            [
                'categories_id' => "1",
                'names' => "vivo",
                'icon' => "vivo-logo-220-220x48-3.png",
                'location' => "7",
                'alias' => "vivo",
                'status' => "1",
            ],

        ];
        foreach ($brands as $item) {
            DB::table('brands')->insert(
                [
                    'categories_id' => $item['categories_id'],
                    'names' => $item['names'],
                    'icon' => $item['icon'],
                    'location' => $item['location'],
                    'alias' => $item['alias'],
                    'status' => $item['status'],
                ]
            );
        }
    }
}
