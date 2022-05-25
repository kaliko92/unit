<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id'=>1,
                'name'=>'water',
                'unitId'=> 1
            ],
            [
                'id'=>2,
                'name'=>'rope',
                'unitId'=> 6
            ],
            [
                'id'=>3,
                'name'=>'bottle',
                'unitId'=> 14
            ],
            

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
        
    }
}
