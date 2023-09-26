@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <form method="post" action="{{ route('admin.news.store') }}">
        {{--csrf создает скрытое поле _token для проверки csrf запроса post--}}
        @csrf
        <div class="form-group">
            <label for="category_id">Категория новостей</label>
            <select class="form-control" name="category_id" id="category_id">
                <option @if(old('category_id') === '1') selected @endif>1</option>
                <option @if(old('category_id') === '2') selected @endif>2</option>
                <option @if(old('category_id') === '3') selected @endif>3</option>
                <option @if(old('category_id') === '4') selected @endif>4</option>
                <option @if(old('category_id') === '5') selected @endif>5</option>
                <option @if(old('category_id') === '6') selected @endif>6</option>
                <option @if(old('category_id') === '7') selected @endif>7</option>
                <option @if(old('category_id') === '8') selected @endif>8</option>
                <option @if(old('category_id') === '9') selected @endif>9</option>
                <option @if(old('category_id') === '10') selected @endif>10</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="image">Фото</label>
            <input type="url" class="form-control" name="image" id="image" value="{{ old('image') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if(old('status') === 'draft') selected @endif>draft</option>
                <option @if(old('status') === 'active') selected @endif>active</option>
                <option @if(old('status') === 'blocked') selected @endif>blocked</option>
            </select>
        </div>
        <button style="margin-top:20px;" type="submit" class="btn btn-success">Save</button>
    </form>
@endsection

{{--@push('js')--}}
{{--    <script>alert('Hello')</script>--}}
{{--@endpush--}}
