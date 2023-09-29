<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


final class NewsController extends Controller
{

    //отображает список новостей
    public function index(): View
    {
        $news = News::query()->paginate(6);// с моделью News
        //$news = DB::table('news')->get(); без модели
        return \view('news.index', [
            'newsList' => $news,
            //передаем внутрь представления параметры
            //нужно создать переменную news в представлении
            //и передать в неё массив news из метода getNews
        ]);
    }

    //Отображает конкретную новость
    public function show(News $news): View
    {
        //$news = News::query()->find($id); с моделью News
        //$news = DB::table('news')->find($id); без модели
        return \view('news.show', [
            'news' => $news,
        ]);
    }
}
