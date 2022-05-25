<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return response()->json($stocks,200);
    }

    public function show($id)
    {
        $stock = Stock::find($id);
        if(is_null($stock)){
            return response()->json(['message'=>'Record not found!'], 404);
        }
        return response()->json($stock, 200) ;
    }



    public function store(StorestockRequest $request)
    {
        $newStock = Stock::create([
            'qty'=> $request->qty,
            'unitId' => $request->unitId,
            'productId' => $request->productId,

        ]);
        return response()->json($newStock, 201);       

    }

    public function update(UpdatestockRequest $request, $id)
    {
        $stock= Stock::find($id);

        if(is_null($stock)){
            return response()->json(['message'=>'Record not found!'], 404);
        }

        $stock->update([
            'qty'=> $request->qty,
            'unitId' => $request->unitId,
            'productId' => $request->productId,
        ]);

        $stock->save();
        return response()->json($stock, 200);
    }


    public function destroy($id)
    {
        $stock = Stock::find($id);
        if (is_null($stock)) {
            return response()->json(["message"=> "record not found!"], 404);
        }
        $stock->delete();
    
        return response()->json(Stock::all(),204);
    }
}
