<?php

use Illuminate\Support\Facades\Route;

Route::get('/{file}', 'Controllers\ImageController@modify')
    ->name('get.images.modify');

Route::get('/', function () {
        return view('examples');
    })->name('get.images.example');
