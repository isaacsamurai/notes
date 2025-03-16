<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticacaoController extends Controller
{
    public function login() {
        return view('login');
    }
    
    public function loginSubmit(Request $request){

        echo 'login adentrado';
    }

    public function logout(){
        echo "logout";
    }

}
