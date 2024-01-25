@extends('frontend.layouts.main')
@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($category->posts as $post)
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset('img/gundam.jpg') }}" class=" card-image" alt="...">
            <div class="card-body">
                <a href="/category/"><h5 class="card-title">{{ $post->title }}</h5></a>
                <p class="card-text">{{ $post->body }}</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    @endforeach
        


</div>
@endsection