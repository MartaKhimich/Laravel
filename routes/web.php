<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;

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

Route::group(['prefix' => ''], static function() {
    //страница для вывода нескольких новостей
    Route::get('/news', [NewsController::class, 'index'])
        //метод именования роутов, если меняется uri, то не надо
        //менять везде, так как мы указываем имя роута, а не uri
         ->name('news');

    //страница для вывода одной новости
    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
        ->name('news.show'); //\d+ регулярное выражение, на вход - только цифры
});
