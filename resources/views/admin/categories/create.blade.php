@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

    @include('inc.message')

    <form method="post" action="{{ route('admin.categories.store') }}">
        {{--csrf создает скрытое поле _token для проверки csrf запроса post--}}
        @csrf
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <button style="margin-top:20px;" type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.categories.index') }}" style="margin-top:20px;"  class="btn btn-danger">Cancel</a>
    </form>
@endsection


