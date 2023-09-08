<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    //отображает список новостей
    public function index()
    {
        return \view('news.index', [
            'news' => $this->getNews(),
            //передаем внутрь представления параметры
            //нужно создать переменную news в представлении
            //и передать в неё массив news из метода getNews
        ]);
    }

    //Отображает конкретную новость
    public function show(int $id): array
    {
        return $this->getNews($id);
    }
}
