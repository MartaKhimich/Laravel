<?php

declare(strict_types=1);

namespace App\Http\Controllers;


class CategoryController extends Controller
{
    use CategoryTrait;

    //отображает список категорий
    public function index()
    {
        return \view('news.categories', [
            'categories' => $this->getCategories(),
            //передаем внутрь представления параметры
            //нужно создать переменную categories в представлении
            //и передать в неё массив data из метода getCategories
        ]);
    }

    //Отображает конкретную категорию
    public function show(int $id): array
    {
        return $this->getCategories($id);
    }
}
