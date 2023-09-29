<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //отображает список категорий
    public function index(): View
    {
        $categories = Category::all();
        //$categories = DB::table('categories')->get();
        return \view('news.categories', [
            'categories' => $categories,
            //передаем внутрь представления параметры
            //нужно создать переменную categories в представлении
            //и передать в неё массив data из метода getCategories
        ]);
    }

    //Отображает конкретную категорию
    public function show(Category $category): View
    {
        //$categories = DB::table('categories')->find($id);
        return \view('#', [
            'categories' => $category,
        ]);
    }
}
