@extends('dashboard.main')
@section('content')
<form action="/dashboard/category/{{ $category->slug }}" method="POST" class="col-9 my-3" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    {{-- title --}}
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- slug --}}
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
        @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- Image --}}
    <div class="mb-3">
        <input type="hidden" name="oldImage" value="{{ $category->image }}">
        <label for="image" class="form-label">Category Image</label>
        @if ($category->image)
        <img src="{{ asset('storage/'.$category->image) }}" alt="Image Preview" class="img-preview img-fluid mb-2 col-sm-5 d-block">
        @else
        <img src="" alt="Image Preview" class="img-preview img-fluid mb-2 col-sm-5 d-block">
        @endif
        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
    </div>

    {{-- save button --}}
    <button type="submit" class="btn btn-primary">Save</button>
</form>

<script>
    // generating slug
    const title = document.getElementById('name')
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