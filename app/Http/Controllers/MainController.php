<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //load user´s view

        $id = session('user.id');
        $notes = User::find($id)->notes()
                                ->whereNull('deleted_at')
                                ->get()
                                ->toarray();

        return view('home', ['notes' => $notes]);
    }
    public function newNote()
    {
        //show new note
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
        $request->validate
        (
        //form validation
            [
                'text_title' => 'required|min:3|max:200',
                'text_note'  => 'required|min:3|max:3000'
            ],
            //error messages
            [
                'text_title.required' => 'O título é obrigatório',
                'text_title.min'      => 'O título precisa ter no mínimo 3 caracteres',
                'text_title.max'      => 'O título deve ter no máximo 3000 caracteres',

                'text_note.required'  => 'A nota é obrigatória',
                'text_note.min'       => 'A nota precisa ter no mínimo 3 caracteres',
                'text_note.max'       => 'A nota deve ter no máximo 3000 caracteres'
            ]
        );

        //get user id
        $id = session('user.id');

        //create a new note
        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        //redirect to home
        return redirect()->route('paginainicialdohomem');
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);

        //load note
        $note = Note::find($id);

        //show edit note view
        return view('edit_note', ['note' => $note]);
    }

    public function editNoteSubmit(Request $request)
    {
        $request->validate
        (
        // validation
            [
                'text_title' => 'required|min:3|max:200',
                'text_note'  => 'required|min:3|max:3000'
            ],
            //error messages
            [
                'text_title.required' => 'O título é obrigatório',
                'text_title.min'      => 'O título precisa ter no mínimo 3 caracteres',
                'text_title.max'      => 'O título deve ter no máximo 3000 caracteres',

                'text_note.required'  => 'A nota é obrigatória',
                'text_note.min'       => 'A nota precisa ter no mínimo 3 caracteres',
                'text_note.max'       => 'A nota deve ter no máximo 3000 caracteres'
            ]
        );

        //check is note_id exist
        if ($request->note_id == null){
            return redirect()->route('paginainicialdohomem');
        }

        //decrypt note_id
        $id = Operations::decryptId($request->note_id);

        //load note
        $note = Note::find($id);

        //update note
        $note->title = $request->text_title;
        $note->text  = $request->text_note;
        $note->save();
        //redirect to home
        return redirect()->route('paginainicialdohomem');
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);

        //load note
        $note = Note::find($id);

        //show delete note confirmation
        return view('delete_note', ['note' => $note]);
    }

    public function deleteNoteConfirm($id)
    {
        //check if $id is encrypted
        $id = Operations::decryptId($id);

        //load note
        $note = Note::find($id);

        //hard delete
        $note->delete();

        //soft delete
        //$note->deleted_at = date('Y:m:d H:i:s');
        //$note->save();

        //redirect
        return redirect()->route('paginainicialdohomem');
    }
}

