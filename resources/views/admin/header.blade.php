<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if (isset($title))
            {{ __('messages.' . $title) }}
        @else
            {{ __('messages.admin') }}
        @endif
    </title>
    <meta name="description"
        content="@if (isset($desc)) {{ $desc }} @else {{ __('description.default') }} @endif">
    <a rel="canonical" href="{{ url()->current() }}">
        <a rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
            <!-- jQuery MUST come first -->

            @include('lib.custom_lib')

            @yield('page-css')
</head>

<body class="d-flex flex-column min-vh-100">
    {{-- Top Info Bar --}}
<div class="top-info-bar d-none d-lg-block bg-primary text-white py-3">
    <div class="container">
        <div class="row align-items-center">

            <div class="col d-flex justify-content-start">
                <a href="/bootcamp" class="btn btn-sm btn-light fw-semibold text-primary">
                    Bootcamps
                </a>
            </div>

            <div class="col d-flex justify-content-center" style="min-width: 459px;">
                <ul class="list-inline mb-0 d-flex gap-4">
                    <li class="list-inline-item d-flex align-items-center gap-2">
                        <i class="fa fa-phone"></i>
                        <span>0317-1170280 | 0317-1170281</span>
                    </li>

                    <li class="list-inline-item d-flex align-items-center gap-2">
                        <i class="fa fa-envelope"></i>
                        <span>burraq@burraq.org</span>
                    </li>
                </ul>
            </div>

            <div class="col d-flex justify-content-end">
                <a href="/contact" class="btn btn-sm btn-light fw-semibold text-primary">
                    Enroll Now
                </a>
            </div>

        </div>
    </div>
</div>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="/" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="40" height="40">
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mx-auto" id="navbarNavDropdown">
            <ul class="navbar-nav d-flex flex-row gap-3">

                {{-- Trainings Dropdown --}}
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-black"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Trainings
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 animate-dropdown">
                        <li class="dropdown-header text-uppercase small text-muted">
                            Trainings
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item fw-semibold py-2" href="/trainings/web">
                                Web Development
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item fw-semibold py-2" href="/trainings/mobile">
                                Mobile Development
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item fw-semibold py-2" href="/trainings/cloud">
                                Cloud & DevOps
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Blogs --}}
                <li class="nav-item">
                    <a class="nav-link text-black" href="/blogs">Blogs</a>
                </li>

                {{-- Contact Dropdown --}}
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-black"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Contact
                    </a>

                    <ul class="dropdown-menu animate-dropdown">
                        <li>
                            <a class="dropdown-item" href="/contact/general">General</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/contact/support">Support</a>
                        </li>
                    </ul>
                </li>

                {{-- Corporate Trainings --}}
                <li class="nav-item">
                    <a class="nav-link text-black" href="/corporate-trainings">
                        Corporate Trainings
                    </a>
                </li>

            </ul>
        </div>

        {{-- Search (replace React component) --}}
        <div class="d-flex align-items-center">
            <form class="d-flex" role="search" method="GET" action="#">
    <input
        class="form-control me-2 rounded-pill"
        type="search"
        name="q"
        placeholder="Search Course"
        aria-label="Search"
    >
    <button class="btn btn-dark rounded-pill" type="submit">
        Search
    </button>
</form>

        </div>

    </div>
</nav>



    <div class="container-fluid mt-3 flex-grow-1">
        <div class="row no-gutters">
            <!-- MAIN CONTENT -->
            <div class="col-md-12" id="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('footer')
</body>

</html>
