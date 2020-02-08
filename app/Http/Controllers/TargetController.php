<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Target;

class TargetController extends Controller
{
    public function getAllTargets(){

        $targets = Target :: paginate(30);

        return response()->json($targets);
    }

    public function addNewTargets(Request $request){
    
        $targets = new Target();
        $targets->name = $request['name'];
        $targets->course_id = $request['course_id'];
        $targets->save();
    
        return response()->json([
    
            'status_code' => 201,
            'message' => 'Level created sucessfuly',
            'data' => $targets
        ]);
            }
}
