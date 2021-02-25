<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;
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
        for ($i=0; $i < 100; $i++) { 
            DB::table('products')->insert([
                'sub_categories_id' =>array_rand([1,2,3]),
                'sale_id' => array_rand([1,2]),
                'name' => Str::random(10),
                'title' => Str::random(25),
                'detail' => Str::random(50),
                'capacity' =>  array_rand([64, 128, 256, 512]),
                'price' => array_rand([50,100,200,150,300,500,540,600,1200,1000,900]),
                'is_hot' => array_rand([1,0]),
                'is_sale' => array_rand([1,0]),
                'number'  => array_rand([1,0,2,5,12,16,24,55,30,4,3,7,100,50]),
                'is_special' => array_rand([1,0]),
                'is_show' => 1,
                'type'  => array_rand([1,0]),
                'date' => Carbon::today()->subDays(rand(0, 365)),
                'country' => array_rand(['VN', 'China', 'USA', 'Singapore']),
            ]);
        }
    }
}
