@extends('frontend.layouts.main')
@section('content')
<div class="text-center my-5">
    <h1 class="display-4 text-secondary">No results for '{{ request('search') }}'</h1>
</div>
@endsection