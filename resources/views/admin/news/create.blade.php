@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

    @include('inc.message')

    <form method="post" action="{{ route('admin.news.store') }}">
        {{--csrf создает скрытое поле _token для проверки csrf запроса post--}}
        @csrf
        <div class="form-group">
            <label for="category_id">Категория новостей</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach($categories as $category)
                    {{--<option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{
                        $category->title }}</option>--}}
                    <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected
                        @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   name="title" id="title" value="{{ old('title') }}">
            @error('title') <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{ $message }}
            </div> @enderror
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="url" class="form-control" name="image" id="image" value="{{ old('image') }}">
            {{--<input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}">--}}
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
        <a href="{{ route('admin.news.index') }}" style="margin-top:20px;"  class="btn btn-danger">Cancel</a>
    </form>
@endsection

{{--@push('js')--}}
{{--    <script>alert('Hello')</script>--}}
{{--@endpush--}}
