<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                'id'=>1,
                'name'=>'liter',
                'rate'=>1,
                'parentId'=> 0
            ],[
                'id'=>2,
                'name'=>'milliliter',
                'rate'=>1000,
                'parentId'=> 1
            ],[
                'id'=>3,
                'name'=>'m3',
                'rate'=>0.001,
                'parentId'=> 1
            ],[
                'id'=>4,
                'name'=>'millimeter',
                'rate'=>0.001,
                'parentId'=> 5
            ],[
                'id'=>5,
                'name'=>'centimeter',
                'rate'=>0.01,
                'parentId'=> 5
            ],[
                'id'=>6,
                'name'=>'meter',
                'rate'=>1,
                'parentId'=> 0
            ],[
                'id'=>7,
                'name'=>'kilometer',
                'rate'=>1000,
                'parentId'=> 5
            ],[
                'id'=>8,
                'name'=>'kilogram',
                'rate'=>1,
                'parentId'=> 0
            ],[
                'id'=>9,
                'name'=>'bag',
                'rate'=>0.02,
                'parentId'=> 7
            ],[
                'id'=>10,
                'name'=>'ton',
                'rate'=>0.001,
                'parentId'=> 7
            ],[
                'id'=>11,
                'name'=>'pcs',
                'rate'=>1,
                'parentId'=> 0
            ],[
                'id'=>12,
                'name'=>'kilogram',
                'rate'=>0.4,
                'parentId'=> 10
            ],[
                'id'=>13,
                'name'=>'box',
                'rate'=>0.05,
                'parentId'=> 10
            ],[
                'id'=>14,
                'name'=>'liter',
                'rate'=>1,
                'parentId'=> 0
            ],[
                'id'=>15,
                'name'=>'dozen',
                'rate'=>0.083333,
                'parentId'=> 13
            ],[
                'id'=>16,
                'name'=>'box',
                'rate'=>0.041667,
                'parentId'=> 13
            ],
            
            

        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
