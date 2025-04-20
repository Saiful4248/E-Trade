<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("products")->insert([
            [
                "name"=> "Samsung",
                "price"=> "45000",
                "category"=>"Samartphone",
                "gallary"=>"https://www.gsmarena.com.bd/images/products/Samsung-Galaxy-C55-Orange.jpg",
                "description"=> "This phone with 8/12 GB RAM,256 GB Internal Memory.It has many feature which is uer friendly",

            ],
            [
                "name"=> "Xiaomi",
                "price"=> "32000",
                "category"=>"Samartphone",
                "gallary"=>"https://www.mobiledokan.co/wp-content/uploads/2024/04/Xiaomi-Redmi-Pad-Pro-Dark-Gray.webp",
                "description"=> "This phone with 12 GB RAM,256 GB Internal Memory.It has many feature which is uer friendly",

            ],
            [
                "name"=> "OnePlus",
                "price"=> "35000",
                "category"=>"Samartphone",
                "gallary"=>"https://www.gsmarena.com.bd/images/products/OnePlus-NordCE4.jpg",
                "description"=> "This phone with 8/12 GB RAM,256 GB Internal Memory.It has many feature which is uer friendly",

            ],
            [
                "name"=> "Pixel",
                "price"=> "75000",
                "category"=>"Samartphone",
                "gallary"=>"https://www.startech.com.bd/image/cache/catalog/mobile/google/pixel-7-pro/pixel-7-pro-obsidian-500x500.webp",
                "description"=> "This phone with 8/12 GB RAM,18 GB Internal Memory.It has many feature which is uer friendly",

            ],
            [
                "name"=> "Sony",
                "price"=> "180000",
                "category"=>"SamartTV",
                "gallary"=>"https://www.startech.com.bd/image/cache/catalog/television/sony/75x8000h/75x8000h-01-500x500.jpg",
                "description"=> "This device has Anroid feature.It has many feature which is uer friendly",

            ],
            [
                "name"=> "Walton",
                "price"=> "114000",
                "category"=>"Refrigerator",
                "gallary"=>"https://waltonbd.com/image/magictoolbox_cache/cf3e6ec01aac7cb79461bcfe9d0d075e/2/6/2631_product/thumb1000x1000/856994780/wfc-3f5-gdxx-xx-Inverter.jpg,",
                "description"=> "This has !00% copper Codenser"
            ],
            [
                "name"=> "Vison",
                "price"=> "74000",
                "category"=>"Air Conditioner",
                "gallary"=>"https://5.imimg.com/data5/UD/CD/UD/ANDROID-2577822/prod-20200725-2212247928036451076505197-jpg-500x500.jpg",
                "description"=> "The Midea MSA-12CRN is a 12000 BTU 1 Ton Split Type Air Conditioner that provides effective and dependable cooling performance for rooms up to 120 square feet."

            ],

        ]


    );
    }
}
