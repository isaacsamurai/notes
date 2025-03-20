<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request){

        $request->validate
        (
            //form validation
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            //error messages
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email' => 'O username precisa ser um email válido',
                'text_password.required' => 'A senha é orbigatória',
                'text_password.min' => 'A senha precisa ter no mínimo 6 caracteres',
                'text_password.max' =>'A senha deve ter no máximo 16 caracteres'
            ]

        );

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        echo "tamo aqui";
    }

    public function logout(){
        echo "logout";
    }

}
