<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

// All Authentication Routes
Route::middleware([CheckIsNotLogged::class])->group(function(){
    Route::get('/login', [AutenticacaoController::class, 'login']);
    Route::post('/loginSubmit', [AutenticacaoController::class, 'loginSubmit']);
});

// app routes user logged
Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('paginainicialdohomem');
    Route::get('/logout',[AutenticacaoController::class, 'logout'])->name(('logout'));

    Route::get('/newNote', [MainController::class, 'newNote'])->name('criandohorrores');
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');

    //edit note
    Route::get('/editNote/{id}', [MainController::class, 'editNote'])->name('edit');
    Route::post('/editNoteSubmit', [MainController::class, 'editNoteSubmit'])->name('editNoteSubmit');

    //delete note
    Route::get('/deleteNote/{id}', [MainController::class, 'deleteNote'])->name('delete');
    Route::get('/deleteNoteConfirm/{id}', [MainController::class, 'deleteNoteConfirm'])->name('deleteNoteConfirm');
});
