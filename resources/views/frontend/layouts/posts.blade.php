@extends('frontend.layouts.main')
@section('content')

<div class="row">
    <h1>{{ $title }}</h1>
</div>
<div class="row row-cols-md-3">
    <?php foreach ($posts as $post) : ?>
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('img/gundam.jpg') }}" class=" card-image" alt="...">
                <div class="card-body">
                    <a href="/post/{{ $post->slug }}" class="text-decoration-none text-success"><h5 class="card-title">{{ $post->title }}</h5></a>
                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none"><small class="text-body-secondary">By: {{ $post->author->name }}</small></a>
                    <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none"><small class="text-body-secondary d-block mb-3">Category: {{ $post->category->name }}</small></a>
                    <p class="card-text">{{$post->excerpt}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Last updated {{ $post->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>
</div>
@endsection