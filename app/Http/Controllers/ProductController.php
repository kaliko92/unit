<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products,200);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message'=>'Record not found!'], 404);
        }
        return response()->json($product, 200) ;
    }



    public function store(StoreProductRequest $request)
    {
        $newProduct = Product::create([
            'name'=> $request->name,

        ]);
        return response()->json($newProduct, 201);       

    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product= Product::find($id);

        if(is_null($product)){
            return response()->json(['message'=>'Record not found!'], 404);
        }

        $product->update([
            'name' => $request->name,
        ]);

        $product->save();
        return response()->json($product, 200);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return response()->json(["message"=> "record not found!"], 404);
        }
        $product->delete();
    
        return response()->json($product::all(),204);
    }
}
