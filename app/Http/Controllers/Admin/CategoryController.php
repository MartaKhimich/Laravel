<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\Create;
use App\Http\Requests\Admin\Category\Edit;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        return \view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $category = new Category($data);

        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');

        //dd($request->all());
//        $request->flash();
//        return redirect()->route('admin.categories.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
