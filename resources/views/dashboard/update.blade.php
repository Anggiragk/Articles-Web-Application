@extends('dashboard.main')
@section('content')
<form action="/dashboard/post/{{ $post->slug }}" method="POST" class="col-9 my-3" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    {{-- title --}}
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title)  }}">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- slug --}}
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- category --}}
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select @error('category')is-invalid @enderror" name="category_id" id="category">
            @foreach ($categories as $category)
            @if (old('category_id', $post->category_id) == $category->id)
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @endif
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="mb-3">
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        <label for="image" class="form-label">Article Images</label>
        @if ($post->image)
        <img src="{{ asset('storage/'.$category->image) }}" alt="Image Preview" class="img-preview img-fluid mb-2 col-sm-5 d-block">
        @else
        <img src="" alt="Image Preview" class="img-preview img-fluid mb-2 col-sm-5">
        @endif
        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
    </div>

    {{-- body --}}
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        @error('body')
        <small class="text-danger"><br/>{{$message}}</small>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
        <trix-editor input="body"></trix-editor>
    </div>

    {{-- update button --}}
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
    const title = document.getElementById('title')
    const slug = document.getElementById('slug')

    title.addEventListener('change', function() {
        fetch('/dashboard/slug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    //turn off trix upload feature
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    // change preview image
    function previewImage(){
        const image = document.getElementById('image')
        const imgPreview = document.querySelector('.img-preview')
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload =  function(oFREvent){
            imgPreview.src = oFREvent.target.result
        }
    }
</script>
@endsection