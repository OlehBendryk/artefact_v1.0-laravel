    <!DOCTYPE html>
<html lang="ua">
<head>
    <meta name="csrf-token" content="<?= csrf_token() ?>" />
    <meta name="csrf-param" content="_token" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}" type="image/x-icon">--}}
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    {{--    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" >--}}
    {{--    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">--}}

</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin') }}">
        <i class="fas fa-users-cog"> ArteFact</i>
        <p class="fs-6 text-muted">Dashboard
            @if(Auth::user()->roles->first()->name !== 'superadmin')
                <span class="text-success ml-10">{{Auth::user()->subdomain->name}}</span>
            @endif
        </p>
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
{{--    <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">--}}

    <div class="navbar-nav">
        <div class="nav-item text-nowrap d-flex align-items-baseline">
            <a href="{{route('moderator.show', Auth::user()->id )}}" class="mt-2 btn btn-info ">
                {{ \Illuminate\Support\Facades\Auth::user()->name }}
                <span class="text-success" style="font-size:80%" >{{Auth::user()->roles->first()->name}}</span>
            </a>
            <a class="nav-link px-3" href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt "></i>
                Sign out
            </a>
        </div>
    </div>
</header>

{{-- Error hadling --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert-danger alert">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
{{----}}

{{--Content--}}

@section('journalist')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('post.index') }}">
            <i class="far fa-newspaper"></i>
            Posts
        </a>
    </li>
@endsection

@section('admin')
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

    @yield('journalist')

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
@endsection

@section('superadmin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('subdomain.index') }}">
            <i class="fas fa-globe"></i>
            Subdomains
        </a>
    </li>

    @yield('admin')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('role.index') }}">
            <i class="fas fa-user-tag"></i>
            Roles
        </a>
    </li>

@endsection
{{----}}

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    @if(auth()->check() && Auth::user()->roles->first()->name === 'superadmin')
                        @yield('superadmin')
                    @elseif(auth()->check() && Auth::user()->roles->first()->name === 'admin')
                        @yield('admin')
                    @else
                        @yield('journalist')
                    @endif

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

<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="{{ URL::asset('rails.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
@yield('scripts')
</body>

</html>
