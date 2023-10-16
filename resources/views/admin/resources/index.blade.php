@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список URL</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <form method="post" action="{{ route('admin.resources.store') }}">
                    @csrf
                    <label>
                        <input class="form-control" type="text" name="url" placeholder="URL">
                    </label>
                    <button class="btn btn-sm btn-outline-secondary" type="submit">Добавить URL</button>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive small">

        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">URL</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $item)
                <tr>
                    <td >{{$item->id}}</td>
                    <td >{{$item->url}}</td>
                    <td>{{$item->created_at}}</td>
                    <td><a href="{{ route('admin.resources.edit', $item) }}">Ред.</a> |
                        <a rel="{{route('admin.resources.delete', $item)}}" class="delete" href="javascript:" style="color: red">Удал.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Записей нет
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{--        {{ $users->links() }}--}}
    </div>
@endsection





