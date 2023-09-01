<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//страница приветствия пользователей
Route::get('/hello/{name}', static function(string $name): string {
    return "Hello, {$name}";
});

//страница с информацией о проекте
Route::get('/info', function() {
    return "Project GeekBrains. Student: Marta Khimich";
});

//страница для вывода нескольких новостей
Route::get('/news', function() {
    return "News";
});

//страница для вывода одной новости
Route::get('/news/{id}', static function(int $id): string {
    return "News with #ID {$id}";
});
