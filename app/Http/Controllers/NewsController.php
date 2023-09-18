<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


final class NewsController extends Controller
{
    use NewsTrait;

    //отображает список новостей
    public function index(): View
    {
        return \view('news.index', [
            'newsList' => $this->getNews(),
            //передаем внутрь представления параметры
            //нужно создать переменную news в представлении
            //и передать в неё массив news из метода getNews
        ]);
    }

    //Отображает конкретную новость
    public function show(int $id): View
    {
        return \view('news.show', [
            'news' => $this->getNews($id),
        ]);
    }
}
