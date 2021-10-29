@extends('layouts.app')

<style>
    body {
        font-family: 'Nunito', sans-serif;
        /*text-align: center;*/
        /*font-weight: bold;*/
        /*font-size: large;*/
    }
    .container {
        margin-bottom: 20px;
    }
</style>
<body >

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('main') }}">
        <i class="fas fa-users-cog"> ArteFact</i>
        <p class="fs-6 text-muted">Dashboard</p>
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="{{route('logout')}}">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('moderator.index') }}">
                            <i class="fas fa-user-shield"></i>
                            Moderators
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
                        <a class="nav-link" href="{{ route('subdomain.index') }}">
                            <i class="fab fa-internet-explorer"></i>
                            Subdomains
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">
                            <i class="fas fa-list-ul"></i>
                            Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('permission.index') }}">
                            <i class="fas fa-id-card"></i>
                            Permissions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.index') }}">
                            <i class="far fa-newspaper"></i>
                            Posts
                        </a>
                    </li>


                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                    </a>
                </h6>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
{{--                    <div class="btn-group me-2">--}}
{{--                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>--}}
{{--                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
{{--                    </div>--}}
{{--                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">--}}
{{--                        This week--}}
{{--                    </button>--}}
                </div>
            </div>
            <div>
                @yield('content')
            </div>

        </main>
    </div>
</div>


</body>
