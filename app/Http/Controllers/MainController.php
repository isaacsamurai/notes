<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $id = session('user.id');
        $user = User::find($id)->toarray();
        $notes = User::find($id)->notes()->get()->toarray();

        echo '<pre>';

        print_r($user);
        print_r($notes);

    }
    public function newNote()
    {
        echo "I create a new note, o mano esta criando demais";
    }

}
