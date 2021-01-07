<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name'=>'Elektronik'],
            ['name'=>'Game']
        ]);
        DB::table('products')->insert([
            [
                'types_id'=>1,
                'photo'=>'storage/images/iphone.png',
                'name'=>'Iphone',
                'price'=> 12000000,
                'desc'=>'Iphone dengan harga 12.000.000'
            ],
            [
                'types_id'=>1,
                'photo'=>'storage/images/macbook.png',
                'name'=>'Macbook',
                'price'=> 25000000,
                'desc'=>'harga notebook ini mahal'
            ],
            [
                'types_id'=>1,
                'photo'=>'storage/images/xiaomi.png',
                'name'=>'Xiaomi',
                'price'=> 3000000,
                'desc'=>'handphone pasaran'
            ],
            [
                'types_id'=>2,
                'photo'=>'storage/images/vandal.png',
                'name'=>'Vandal Prime',
                'price'=> 2900,
                'desc'=>'one tap'
            ],
            [
                'types_id'=>2,
                'photo'=>'storage/images/ares.png',
                'name'=>'Ares',
                'price'=> 1600,
                'desc'=>'brrrrrrrrrrrrrrrrraaaaaaaaaaaa'
            ]
        ]);
    }
}
