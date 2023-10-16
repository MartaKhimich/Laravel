@extends('layouts.app')
@section('title') Новость - @parent @stop
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <img src="{{ $news->image }}" width="20%" height="20%">
            <h2>{{ $news->title }}</h2>
            <p>{{ $news->status }}</p>
            <p>{!! $news->description !!}</p>
            <div><strong>{{ $news->author }} ({{ $news->created_at }})</strong>
                <a href="<?=route('news')?>">К новостям</a>
            </div>
        </div>
    </div>
@endsection
