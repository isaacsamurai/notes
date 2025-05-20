<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Dotenv\Parser\Value;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        //load user´s view

        $id = session('user.id');
        $notes = User::find($id)->notes()->get()->toarray();

        return view('home', ['notes' => $notes]);
    }
    public function newNote()
    {
        echo "I create a new note, o mano esta criando demais";
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);
        echo "I´m editing note with id = $id";
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);
        echo "I´m deleting note with id = $id";
    }
}

