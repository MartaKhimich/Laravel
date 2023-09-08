<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * Отображает данные (условно весь список новостей)
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * Отображение формы создания новой новости
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Получаем данные из формы создания новости
     */
    public function store(Request $request)
    {
        //
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
