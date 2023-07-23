<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/{file}', [ImageController::class, 'modify'])
    ->name('get.images.modify');
