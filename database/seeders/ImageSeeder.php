<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrImage = ['item-img-1-1.jpg', 'item-img-1-8.jpg','item-img-1-13.jpg','item-img-1-11.jpg','item-img-1-9.jpg',
    ];
        for ($i=0; $i < 100; $i++) { 
            DB::table('images')->insert([
                'product_id' => 14+$i,
                'path' => $arrImage[array_rand([0,1,2,3.4])],
                'thumbnail' => $arrImage[array_rand([0,1,2,3.4])],
                'is_default' => 1,
            ]);
        }
    }
}
