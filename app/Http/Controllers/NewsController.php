<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


final class NewsController extends Controller
{

    //отображает список новостей
    public function index(): View
    {
        $news = DB::table('news')->get();
        return \view('news.index', [
            'newsList' => $news,
            //передаем внутрь представления параметры
            //нужно создать переменную news в представлении
            //и передать в неё массив news из метода getNews
        ]);
    }

    //Отображает конкретную новость
    public function show(int $id): View
    {
        $news = DB::table('news')->find($id);
        return \view('news.show', [
            'news' => $news,
        ]);
    }
}
