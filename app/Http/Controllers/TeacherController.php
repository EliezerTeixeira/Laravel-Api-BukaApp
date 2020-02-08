<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function getAllTeachers(){

        $teachers = Teacher :: paginate(30);

        return response()->json($teachers);
    }

    public function addNewTeacher(Request $request){

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
            'first_name' => 'required|string|min:2|max:60', // regras de validação
            'last_name' => 'required|string|min:2|max:60',
            'email' => 'required|email|unique:teachers|max:100',
            'phone' => 'string|min:9|max:12'
        ], $messages);

        if ($validation->fails()){

            return response()->json( // Retornar a mensagem de erro
                $validation->errors()
            );
        }

    $teachers = new Teacher();
    $teachers->first_name = $request['first_name'];
    $teachers->last_name = $request['last_name'];
    $teachers->email = $request['email']->unique();
    $teachers->phone = $request['phone']->unique();
    $teachers->save();

    return response()->json([

        'status_code' => 201,
        'message' => 'Teacher created sucessfuly',
        'data' => $teachers
    ]);
}
}
