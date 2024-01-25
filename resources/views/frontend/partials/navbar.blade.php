<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/aicon.svg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            ArtIcles
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'post' ? 'active':'' }}" href="/posts">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'category' ? 'active':'' }}" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active == 'about' ? 'active':'' }}" href="/about">About</a>
                </li>
                
            </ul>
            <form class="d-flex" role="search" action="/posts">
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('search') }}">
                @endif
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request('search') ?? '' }}">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        <i>{{ auth()->user()->name }}</i>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="nav-item">
                        <a class="nav-link  text-dark active" aria-current="page" href="/dashboard/post"><i class="bi bi-house-door"></i> Dashboard</a>
                      </li>
                      <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="nav-link text-dark btn-outline-primary">
                                <i class="bi bi-person-wheelchair"></i>
                                Logout
                            </button>
                            </form>
                      </li>
                    </ul>
                  </li>
                @else
                <li class="nav-item ms-3">
                    <a href="/login" class="btn btn-outline-primary" type="button">
                        <i class="bi bi-person-circle"></i>
                        <i>Login</i>
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>