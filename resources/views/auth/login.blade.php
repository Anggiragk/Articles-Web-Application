@extends('auth.main')

@section('content')
<section class="gradient-custom">
    
    <form action="/login" method="post">
        @csrf
        <div class="container py-5 h-100">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show w-50 m-auto mb-3" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
    
            @if (session()->has('loginFailed'))
            <div class="alert alert-danger alert-dismissible fade show w-50 m-auto mb-3" role="alert">
                <strong>Failed!</strong> {{ session('loginFailed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mt-md-4 pb-3">
    
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
    
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="email">Email or Username</label>
                                    <input type="username" id="username" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}"/>
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
    
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"/>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
    
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </div>
    
                            <div>
                                <p class="mb-0">Don't have an account? <a href="/register" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection