<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return response()->json($units,200);
    }

    public function show($id)
    {
        $unit = Unit::find($id);
        if(is_null($unit)){
            return response()->json(['message'=>'Record not found!'], 404);
        }
        return response()->json($unit, 200) ;
    }



    public function store(StoreUnitRequest $request)
    {
        $newUnit = Unit::create([
            'name'=> $request->name,
            'rate'=> $request->rate,
            'parentId' => $request->parentId,

        ]);
        return response()->json($newUnit, 201);       

    }

    public function update(UpdateUnitRequest $request, $id)
    {
        $unit= Unit::find($id);

        if(is_null($unit)){
            return response()->json(['message'=>'Record not found!'], 404);
        }

        $unit->update([
            'name'=> $request->name,
            'rate'=> $request->rate,
            'unitId' => $request->unitId,
        ]);

        $unit->save();
        return response()->json($unit, 200);
    }


    public function destroy($id)
    {
        $unit = Unit::find($id);
        if (is_null($unit)) {
            return response()->json(["message"=> "record not found!"], 404);
        }
        $unit->delete();
    
        return response()->json($unit::all(),204);
    }
}
