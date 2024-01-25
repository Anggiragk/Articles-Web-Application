@extends('frontend.layouts.main')
@section('content')
<div class="row d-flex">
    <div class="col-md-8 justify-content-center">
        <h1>{{ $post->title }}</h1>
        <small>By <a href="/posts?author={{ $post->author->username }}"> {{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></small>
        <div class="card mb-3">
            @if ($post->image)
            <img src="{{asset('storage/'.$post->image)}}" class="card-img-top" alt="Article Image" title="Article Image">
            @else
            <img src="{{asset('img/minion.jpg')}}" class="card-img-top" alt="Article Image" title="Article Image">
            @endif
            <div class="card-body">
                <p class="card-text">{!! $post->body !!}</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div>

@endsection