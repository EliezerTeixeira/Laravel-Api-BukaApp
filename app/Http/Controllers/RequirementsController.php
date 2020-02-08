<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Requirements;


class RequirementsController extends Controller
{
    public function getAllRequirements(){

        $requirements = Requirements :: paginate(30);

        return response()->json($requirements);
    }

    public function addNewRequeriments(Request $request){
    
        $requirement = new Requirements();
        $requirement->name = $request['name'];
        $requirement->course_id = $request['course_id'];
        $requirement->save();
    
        return response()->json([
    
            'status_code' => 201,
            'message' => 'Level created sucessfuly',
            'data' => $requirement
        ]);
            }
}
