@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="table-responsive small">

        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Пароль</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr id="{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="#">Ред.</a> |
                        <a rel="#" class="delete" href="javascript:" style="color: red">Удал.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
{{--        {{ $users->links() }}--}}
    </div>
@endsection



