<?php

declare(strict_types=1);

namespace App\Http\Controllers;


class IndexController extends Controller
{
    use IndexTrait;

    public function index()
    {
        return \view('index', [
            'info' => $this->getInfo(),
            //передаем внутрь представления параметры
            //нужно создать переменную categories в представлении
            //и передать в неё массив data из метода getCategories
        ]);
    }
}
