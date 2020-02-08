<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function getAllStudents(){

        $students = Student :: paginate(30);

        return response()->json($students);
    }

    public function addNewStudent(Request $request){

        $students = new Student();
        $students->name = $request['name'];
        $students->email = $request['email'];
        $students->phone = $request['phone'];
        $students->birthdate = $request['birthdate'];
        $students->save();

        return response()->json([

            'status_code' => 201,
            'message' => 'Student created sucessfuly',
            'data' => $students
        ]);

}
}