<nav class="navbar navbar-expand-lg navbar-expand-md bg-body-tertiary col-md-2 col-lg2">
  <div class="container-fluid">
    <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="nav flex-column">
        <div class="progress mt-1" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar bg-success progress-bar-animated progress-bar-striped " style="width: 100%"></div>
        </div>
        <li class="nav-item">
          <a class="nav-link  text-dark " aria-current="page" href="/dashboard/"><i class="bi bi-house-door"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-dark {{ Request::is('/dashboard/post*') ? 'active' : '' }}" aria-current="page" href="/dashboard/post"><i class="bi bi-book-half"></i> My Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-dark " aria-current="page" href="/"><i class="bi bi-book-half"></i> Articles</a>
        </li>
        @can('isAdmin')
        <li class="nav-item">
          <a class="nav-link  text-dark {{ Request::is('/dashboard/category*') ? 'active' : '' }}" aria-current="page" href="/dashboard/category"><i class="bi bi-hypnotize"></i> Categories</a>
        </li>
        @endcan
        <li class="nav-item">
          <a class="nav-link  text-dark " href="#"> <i class="bi bi-person-circle"></i> My Profile</a>
        </li>
        <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar bg-warning progress-bar-animated progress-bar-striped " style="width: 100%"></div>
        </div>
        <li class="nav-item">
          <form action="/logout" method="POST">
          @csrf
          <button class="nav-link text-dark btn-outline-primary">
            <i class="bi bi-arrow-left-square"></i>
            <i> Logout</i>
          </button>
          </form>
          <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-danger progress-bar-animated progress-bar-striped " style="width: 100%"></div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>