<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stocks = [
            [
                'qty'=>1,
                'unitId'=> 1,
                'productId'=> 1
            ],[
                'qty'=>500,
                'unitId'=> 2,
                'productId'=> 1
            ],[
                'qty'=>5,
                'unitId'=> 5,
                'productId'=> 2
            ],[
                'qty'=>50,
                'unitId'=> 4,
                'productId'=> 2
            ],[
                'qty'=>50,
                'unitId'=> 10,
                'productId'=> 3
            ],[
                'qty'=>10,
                'unitId'=> 11,
                'productId'=> 3
            ],[
                'qty'=>2,
                'unitId'=> 12,
                'productId'=> 3
            ]
            

        ];

        foreach ($stocks as $stock) {
            Stock::create($stock);
        }
    }
}
