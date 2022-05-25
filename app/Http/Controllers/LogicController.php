<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Stock;
use App\Models\Unit;

class LogicController extends Controller
{
    public function showProductsListInUnit()
    {
        $arr=[];
        foreach (Product::all() as $product) {
            //check if is base unit or sub unit            
            $units=$product->units;

            if($product->unit){
                if($product->unit->parentId==0){//base unit
                    $units = Unit::where('id',$product->unit->id)
                                    ->orWhere('parentId', $product->unit->id)->get();
                }else{//sub unit
                    $units = Unit::where('id',$product->unit->parentId)
                                    ->orWhere('parentId', $product->unit->parentId)->get();
                }
            }else{
                $units=$product->units;
            }

            foreach ($units as $unit) {
                if(!$product){return 'Product not found!';}
                if(!$unit){return 'Unit not found!';}
                
                $stocks = Stock::where('productId', $product->id)->get();
                $total=0;

                foreach ($stocks as $stock) {
                    $qty = UnitConverter::ConvertUnit($stock->unit, $unit, $stock->qty);
                    $total+=$qty;
                }
                $arr0 = [ 
                    'product'=> $product->name,
                    'unit'=> $unit->name,
                    'qty'=>$total,
                ];
                array_push($arr, $arr0);

            }
        }
        
        return response()->json($arr, 201);   

    }

    public function showProductInUnit($productId, $unitId)
    {
        $product = Product::find($productId);
        $unit = Unit::find($unitId);

        if(!$product){return 'Product not found!';}
        if(!$unit){return 'Unit not found!';}

        $units = $product->units;
        if(!$units->find($unitId)){return "product doesn't have this unit ";}

        $stocks = Stock::where('productId', $productId)->get();
        
        $total=0;
        foreach ($stocks as $stock) {
            $qty = UnitConverter::ConvertUnit($stock->unit, $unit, $stock->qty);
            $total+=$qty;
            $arr[] = [ 
                'id'=> $stock->id,
                'product'=> $stock->product->name,
                'qty'=> number_format($qty,3),
                'Origin unit'=> $stock->unit->name,
                'convert to unit'=> $unit->name
            ];
        }

        $result = [
            'product' => $product->name,
            'unit' => $unit->name,
            'total' => $total,
        ];
        array_push($arr, $result);
        // array_merge($arr,$result);
        return response()->json($arr, 201);   

    }

    public function convert($fromUnitId, $toUnitId, $value)
    {
        $fromUnit = Unit::find($fromUnitId);
        $toUnit = Unit::find($toUnitId);
        $result = UnitConverter::ConvertUnit($fromUnit,$toUnit,$value);

        return [
            'from unit'=> $fromUnit,
            'to unit'=> $toUnit,
            'origin value'=> $value,
            'result'=> $result
        ];
    }

}


class UnitConverter{
    //unit liter = 1
    //unit mililiter = 1000
    // convert(liter,milliliter, 5L) => 5000
    // convert(milliliter, liter, 500milliliter) => 0.5
    public static function Convert($from, $to, $value)
    {
        $value = $value / $from * $to;
        return $value;
    }


    public static function ConvertUnit(Unit $from, Unit $to, $value)
    {
        $value = $value / $from->rate * $to->rate;
        return $value;
    }
}