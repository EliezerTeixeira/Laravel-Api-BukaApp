<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function getAllStudents(){

        $students = Student :: paginate(30);

        return response()->json($students);
    }

    public function addNewStudent(Request $request){

        $messages = [
            // mensagem de erro para um campo especifico
            // ex: 'phone.required' , 'phone.min', 'first_name.unique' etc...
            // mensagem de erro para todos os campos.
            'required' => 'O :attribute deve estar preenchido', // :attribute vai referenciar o nome do campo a ser preenchido
            'min' => 'O :attribute deve conter no minino :min caracteres', // :min indica o valor minimo a ser aceite
            'max' => 'O :attribute de conter no máximo :max caracteres', // :max indica o valor máximo a ser aceite
            'unique' => 'O :attribute já existe nos nossos registros',
            'email' => 'Por favor preencha um :attribute válido'
        ];

        $validation = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:60', // regras de validação
            'email' => 'required|email|unique:students|max:100',
            'phone' => 'required|string|unique:students|min:9|max:12',
            'birthdate' => 'required|date'
        ], $messages);

        if ($validation->fails()){

            return response()->json( // Retornar a mensagem de erro
                $validation->errors()
            );
        }

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