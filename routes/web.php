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

Route::get('/hello/{name}', static function(string $name): string {
    return "Hello, {$name}";
});

Route::get('/info', function() {
    return "Project GeekBrains. Student: Marta Khimich";
});

Route::get('/news', function() {
    return "News";
});

Route::get('/news/{id}', static function(int $id): string {
    return "News with #ID {$id}";
});
