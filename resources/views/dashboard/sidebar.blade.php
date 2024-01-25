<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                {{-- tanda * adalah semua sub menjadi active  --}}
                <a class="nav-link {{ Request::is('dashboard/books*') ? 'active' : '' }}" href="/dashboard/books">
                    <span data-feather="file-text"></span>
                    My Books
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <span data-feather="sun"></span>
                    Frontend
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>

        {{-- pengecheckkan menggunakan gate, app/provieders/AuthserviceProvider--}}
        @can('admin')
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
            <a class="link-secondary" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : '' }}" href="/dashboard/category">
                    <span data-feather="layers"></span>
                    Category
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>