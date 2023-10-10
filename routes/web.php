<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\IndexController as AdminController;
use \App\Http\Controllers\Admin\UsersController as AdminUsersController;

/*
|Маршрутизация. Данный файл определяет маршруты для веб-интерфейса
|К маршрутам, определенным в данном файле, можно получить доступ,
|введя URL-адрес определенного маршрута в браузере
*/

Route::group(['prefix' => ''], static function() {
    //страница для вывода нескольких новостей
    Route::get('/news', [NewsController::class, 'index'])
        //метод именования роутов, если меняется uri, то не надо
        //менять везде, так как мы указываем имя роута, а не uri
         ->name('news');

    //страница для вывода одной новости
    Route::get('/news/{news}/show', [NewsController::class, 'show'])
        ->name('news.show');
});

Route::group(['prefix' => ''], static function() {
    //страница для вывода нескольких категорий
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories');

    //страница для вывода одной категории
    Route::get('/categories/{category}/show', [CategoryController::class, 'show'])
        ->name('category.show');
});

Route::prefix('admin')->name('admin.')->middleware(['auth','is.admin'])->group(function () {
    Route::get('/', AdminController::class)->name('index'); //набираем http://127.0.0.1:5555/admin
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class); //набираем http://127.0.0.1:5555/admin/news
    Route::resource('users', AdminUsersController::class);
    Route::get('/users/toggleAdmin/{user}', [AdminUsersController::class, 'toggleAdmin'])->name('toggleAdmin');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
