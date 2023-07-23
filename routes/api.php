<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/{file}', function (Request $request) {
    return 'hi guys';
})->name('get.images.modify');
