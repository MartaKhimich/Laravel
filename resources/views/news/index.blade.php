@extends('layouts.app')
{{--Переопределяем title для дочернего шаблона,
 parent возьмёт title из main.blade--}}
@section('title') Список новостей - @parent @stop
@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h2>News list</h2> <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse($newsList as $news)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ $news->image }}">
                        <div class="card-body">
                            <h2><strong>{{ $news->title }}</strong></h2>
                            <p><strong>{{ $news->status }}</strong></p>
                            <p class="card-text">{{ $news->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.show', $news) }}" class="btn btn-sm btn-outline-secondary">Show</a>
                                </div>
                                <small class="text-body-secondary">{{ $news->author }} ({{ $news->created_at }})</small>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h3>Новостей нет</h3>
                @endforelse

            </div>
            <br>
            {{ $newsList->links() }}
        </div>
    </div>
@endsection


