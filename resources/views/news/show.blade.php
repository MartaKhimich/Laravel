@extends('layouts.main')
@section('title') Новость - @parent @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Новости</h1>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <img src="<?=$news['image']?>" width="20%" height="20%">
            <h2><?=$news['title']?></h2>
            <p><?=$news['status']?></p>
            <p><?=$news['description']?></p>
            <div><strong><?=$news['author']?> (<?=$news['created_at']?>)</strong>
                <a href="<?=route('news')?>">К новостям</a>
            </div>
        </div>
    </div>
@endsection
