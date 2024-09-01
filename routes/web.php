<?php
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});


Route::Resource('articles', ArticleController::class);


