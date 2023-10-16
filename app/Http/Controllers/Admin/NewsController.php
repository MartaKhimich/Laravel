<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\CreateRequest;
use App\Http\Requests\Admin\News\EditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
        abort(404);
    }

    /**
     * Display a listing of the resource.
     * Отображает данные (условно весь список новостей)
     */
    public function index(): View
    {
        $news = News::query()
            ->status()
            ->with('category')
            ->orderByDesc('id')
            ->paginate(10);
        //$news = DB::table('news')->get();
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
        $categories = Category::all();
        return \view('admin.news.create')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * Получаем данные из формы создания новости
     */
    public function store(CreateRequest $request)
    {

        $data = $request->only([
            'category_id',
            'title',
            'image',
            'description',
            'author',
            'status'
        ]);

//        $name = null;
//        if($request->file('image')) {
//            $path = Storage::putFile('public/images/news', $request->file('image'));
//            $name = Storage::url($path);
//        }
//        $data['image'] = $name;

        $news = new News($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');


        //dd($request->all());
//        $request->flash();
//        return redirect()->route('admin.news.create');
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
    public function edit(News $news): View
    {
        $categories = Category::all();
        return \view('admin.news.edit')->with([
            'categories' => $categories,
            'news' =>  $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Данный метод сохраняет данные из формы edit
     */
    public function update(EditRequest $request, News $news)
    {
        //$request->flash();
        //return redirect()->route('admin.news.edit', ['news' => $news]);

        $data = $request->only([
            'category_id',
            'title',
            'image',
            'description',
            'author',
            'status'
        ]);

//        if ($request->file('image')) {
//            $request->validate([
//                'image' => ['sometimes', 'image', 'mimes:jpeg,bmp,png|max:1500']
//            ]);
//            $path = Storage::putFile('public/images/news', $request->file('image'));
//            $name = Storage::url($path);
//            $data['image'] = $name;
//        }

        $news->fill($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->with('error', 'Не удалось изменить запись');

    }

    /**
     * Remove the specified resource from storage.
     * Метод удаляет данные из формы edit
     */
    public function destroy(News $news)
    {
        //сделаем асинхронное удаление,
        //без перезагрузки страницы

        try{
            $news->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
