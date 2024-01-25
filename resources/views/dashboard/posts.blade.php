@extends('dashboard.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1>{{ auth()->user()->name }}'s articles</h1>
</div>

{{-- flash message --}}
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-50 m-auto mb-3" role="alert">
  <strong>Success!</strong> {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('failed'))
<div class="alert alert-danger alert-dismissible fade show w-50 m-auto mb-3" role="alert">
  <strong>Failed!</strong> {{ session('failed') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- paginate --}}
{{ $posts->links() }}

@if (session()->has('loginFailed'))
<div class="alert alert-danger alert-dismissible fade show w-50 m-auto mb-3" role="alert">
  <strong>Failed!</strong> {{ session('failed') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

{{-- table of data --}}
<a href="/dashboard/post/create" class="btn btn-success" title="Add new post">Add</a>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Category</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($posts as $post)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->slug }}</td>
      <td>{{ $post->category->name}}</td>
      <td>{{ $post->created_at }}</td>
      <td>
        <a href="/dashboard/post/{{ $post->slug }}" class="badge text-bg-primary" title="View this post"><i class="bi bi-eye"></i></a>
        <a href="/dashboard/post/{{ $post->slug }}/edit" class="badge text-bg-warning" title="Update this post"><i class="bi bi-eye"></i></a>
        <form action="/dashboard/post/{{ $post->slug }}" method="POST" class="d-inline">
          @method('DELETE')
          @csrf
          <button class="badge text-bg-danger border-0" title="Delete this post" onclick="confirm('Delete this post ?')"><i class="bi bi-x-octagon"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection