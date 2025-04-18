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

Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('paginainicialdohomem');
    Route::get('/newNote', [MainController::class, 'newNote'])->name('criandohorrores');
    Route::get('/logout',[AutenticacaoController::class, 'logout'])->name(('logout'));
});
