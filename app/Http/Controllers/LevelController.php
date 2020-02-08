<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
    public function getAllLevels(){

        $levels = Level :: paginate(30);

        return response()->json($levels);
    }

    public function addNewLevel(Request $request){
    
    $levels = new Level();
    $levels->name = $request['name'];
    $levels->description = $request['description'];
    $levels->save();

    return response()->json([

        'status_code' => 201,
        'message' => 'Level created sucessfuly',
        'data' => $levels
    ]);
        }
}

