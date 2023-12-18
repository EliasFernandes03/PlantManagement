<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return response()->json(['plants' => $plants], 200);
    }

    public function getOne($id)
    {
        $plant = Plant::find($id);
    
        if (!$plant) {
            return response()->json(['message' => 'Plant not found'], 404);
        }
    
        return response()->json(['plant' => $plant], 200);
    }

    public function create(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'type' => 'required|string',
        'difficulty' => 'required|string',
    ]);

    $plant = Plant::create($validatedData);

    return response()->json(['plant' => $plant], 201);
}
public function update(Request $request, $id)
{
    $plant = Plant::find($id);

    if (!$plant) {
        return response()->json(['message' => 'Plant not found'], 404);
    }

    $validatedData = $request->validate([
        'name' => 'string',
        'type' => 'string',
        'difficulty' => 'string',
    ]);

    $plant->fill($validatedData);
    $plant->save();

    return response()->json(['plant' => $plant], 200);
}

public function delete($id)
{
    $plant = Plant::find($id);

    if (!$plant) {
        return response()->json(['message' => 'Plant not found'], 404);
    }

    $plant->delete();

    return response()->json(['message' => 'Plant deleted successfully'], 200);
}
}
