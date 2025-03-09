<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Hello Word";
});

Route::get('/about', function(){
    echo 'About us';
});
