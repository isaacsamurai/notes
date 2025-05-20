<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutenticacaoController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
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
                'text_password.max' => 'A senha deve ter no máximo 16 caracteres'
            ]

        );

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        $user = User::where('username', $username)
            ->where('deleted_at', NULL)->first();

        if(!$user){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Username or password is incorrect');
        }

        if(password_verify($password, $user->password)){
            return redirect()
                ->back()
                ->withInput()
                ->with('loginError', 'Username or password is incorrect');
        }

        //update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        //login user
        session(['user' => ['id' => $user->id,
            'username' => $user->username]
        ]);

        return redirect()->to('/');
    }

        //check is password is correct

    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }
}
