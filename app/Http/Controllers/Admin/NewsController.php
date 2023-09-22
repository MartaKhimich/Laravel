<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    use NewsTrait;
    /**
     * Display a listing of the resource.
     * Отображает данные (условно весь список новостей)
     */
    public function index(): View
    {
        $news = $this->getNews();
        return \view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * Отображение формы создания новой новости
     */
    public function create(): View
    {
        return \view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     * Получаем данные из формы создания новости
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->flash();
        return redirect()->route('admin.news.create');
    }

    /**
     * Display the specified resource.
     * Отображает конкретную запись
     * Принимает id этой новости и отображает её
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Отображает форму редактирования новости
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Данный метод сохраняет данные из формы edit
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Метод удаляет данные из формы edit
     */
    public function destroy(string $id)
    {
        //
    }
}
