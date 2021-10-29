@extends('layouts.app')

@section('dashboard')

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin') }}">
        <i class="fas fa-users-cog"> ArteFact</i>
        <p class="fs-6 text-muted">Dashboard</p>
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subdomain.index') }}">
                            <i class="fas fa-globe"></i>
                            Subdomains
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('moderator.index') }}">
                            <i class="fas fa-user-shield"></i>
                            Moderators
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">
                            <i class="fas fa-list-ul"></i>
                            Categories
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">
                            <i class="far fa-newspaper"></i>
                            Posts
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('role.index') }}">
                            <i class="fas fa-user-tag"></i>
                            Roles
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tag.index') }}">
                            <i class="fas fa-tags"></i>
                            Tags
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('permission.index') }}">
                            <i class="fas fa-id-card"></i>
                            Permissions
                        </a>
                    </li>

                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div>
                @yield('content')
            </div>

        </main>
    </div>
</div>

@endsection
