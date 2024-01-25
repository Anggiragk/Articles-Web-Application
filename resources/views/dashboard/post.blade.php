@extends('dashboard.main')
@section('content')
<div class="row d-flex">
    <div class="col-md-8 justify-content-center">
        <h1>{{ $post->title }}</h1>
        <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning">Edit</a>
        <form action="/dashboard/post/{{ $post->slug }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" title="Delete this post" onclick="confirm('Delete this post ?')">Delete</button>
          </form>
        <div class="card mb-3">
            @if ($post->image)
            <img src="{{asset('storage/'.$post->image)}}" class="card-img-top" alt="Article Image" title="Article Image">
            @else
            <img src="{{asset('img/minion.jpg')}}" class="card-img-top" alt="Article Image" title="Article Image">
            @endif
            <div class="card-body">
                <p class="card-text">{!! $post->body !!}</p>
                <p class="card-text"><small class="text-body-secondary">Last updated {{ $post->updated_at->diffForHumans() }}</small></p>
            </div>
        </div>
    </div>
</div>
@endsection