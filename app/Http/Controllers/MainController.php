<?php

namespace App\Http\Controllers;

use Dotenv\Parser\Value;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function newNote()
    {
        echo "I create a new note, o mano esta criando demais";
    }

}
