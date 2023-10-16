<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resource\CreateRequest;
use App\Http\Requests\Admin\Resource\EditRequest;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('admin/resources/index', ['resources' => Resource::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $resources = Resource::create([
            'url' => $request->get('url')
        ]);

        if($resources->save()) {
            return redirect()->route('admin.resources.index')->with('success', 'URL сохранен в базу данных');
        }
        return back()->with('error', 'Не удалось сохранить URL');
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
    public function edit(EditRequest $request, Resource $resource)
    {
        $data = $request->only([
            'url',
        ]);

        $resource->fill($data);

        if($resource->save()) {
            return redirect()->route('admin.resources.index')
                ->with('success', 'Запись успешно изменена');
        }

        return back()->with('error', 'Не удалось изменить запись');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Resource $resource)
    {
        try{
            $resource->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
