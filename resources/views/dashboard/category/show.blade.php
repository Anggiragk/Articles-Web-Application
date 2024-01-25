@extends('dashboard.main')
@section('content')
<div class="row d-flex">
    <div class="col-md-8 justify-content-center">
        <h1>{{ $category->name }}</h1>
        <a href="/dashboard/category/{{ $category->slug }}/edit" class="btn btn-warning">Edit</a>
        <form action="/dashboard/category/{{ $category->slug }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" title="Delete this post" onclick="confirm('Delete this category ?')">Delete</button>
          </form>
        <div class="card mb-3">
            @if ($category->image)
            <img src="{{asset('storage/'.$category->image)}}" class="card-img-top" alt="Category Image" title="Category Image">
            @else
            <img src="{{asset('img/minion.jpg')}}" class="card-img-top" alt="Category Image" title="Category Image">
            @endif
            <div class="card-body">
                <p class="card-text"><small class="text-body-secondary">Last updated {{ $category->updated_at->diffForHumans() }}</small></p>
            </div>
        </div>
    </div>
</div>
@endsection