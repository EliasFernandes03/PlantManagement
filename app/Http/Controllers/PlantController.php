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
}
