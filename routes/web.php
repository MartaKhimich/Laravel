<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\IndexController as AdminController;

/*
|Маршрутизация. Данный файл определяет маршруты для веб-интерфейса
|К маршрутам, определенным в данном файле, можно получить доступ,
|введя URL-адрес определенного маршрута в браузере
*/

//пробная страница
Route::get('/hello/{name}', static function(string $name): string {
    return "Hello, {$name}";
});

//страница с информацией о проекте
Route::get('/info', [IndexController::class, 'index'])
    ->name('info');

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

Route::group(['prefix' => ''], static function() {
    //страница для вывода нескольких категорий
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories');

    //страница для вывода одной категории
    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])
        ->where('id', '\d+')
        ->name('category.show');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', AdminController::class)->name('index'); //набираем http://127.0.0.1:5555/admin
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class); //набираем http://127.0.0.1:5555/admin/news
});
