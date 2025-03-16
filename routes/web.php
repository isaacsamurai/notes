<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\MainController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

// All Autentication Routes

Route::get('/login', [AutenticacaoController::class, 'login']);

Route::post('/loginSubmit', [AutenticacaoController::class, 'loginSubmit']);

Route::get('/logout',[AutenticacaoController::class, 'logout']);

