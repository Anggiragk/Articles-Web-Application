@extends('auth.main')

@section('content')
<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mt-md-4 pb-3">

                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please register here!</p>
    
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{old('name')}}"/>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
    
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="username">username</label>
                                    <input type="text" id="username" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" value="{{old('username')}}" />
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
    
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typeEmailX">Email</label>
                                    <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}" />
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
    
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label" for="typePasswordX">Password</label>
                                    <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
    
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                            </div>
                        </form>
                        

                        <div>
                            <p class="mb-0">Already have an account? <a href="/login" class="text-white-50 fw-bold">Sign in</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection