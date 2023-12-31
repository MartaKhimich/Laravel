@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}"  class="btn btn-sm btn-outline-secondary">Добавить новую</a>
            </div>
        </div>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', $category) }}">Ред.</a> | <a href="" style="color: red">Удал.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection



