@extends('frontend.layouts.main')
@section('content')
<h1>{{ $title }}</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($categories as $category )
        
    <div class="col">
        <div class="card h-100">
            <img src="{{ asset('img/gundam.jpg') }}" class=" card-image" alt="...">
            <div class="card-body">
                <a href="/posts?category={{ $category->slug }}"><h5 class="card-title">{{ $category->name }}</h5></a>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>
    
    @endforeach

</div>
@endsection