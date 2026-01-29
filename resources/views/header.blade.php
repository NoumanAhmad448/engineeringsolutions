
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
    <x-top_notification/>
    {{-- Top Info Bar --}}
<div class="top-info-bar d-none d-lg-block bg-primary text-white py-3">
    <div class="container">
        <div class="row align-items-center">

            <div class="col d-flex justify-content-start">
                <a href="{{ route("bootcamp") }}" class="btn btn-sm btn-light fw-semibold text-primary">
                    Bootcamps
                </a>
            </div>

            <div class="col d-flex justify-content-center" style="min-width: 459px;">
                <ul class="list-inline mb-0 d-flex gap-4">
                    <li class="list-inline-item d-flex align-items-center gap-2">
                        <i class="fa fa-phone mr-1"></i>
                        <span>0317-1170280 | 0317-1170281</span>
                    </li>

                    <li class="list-inline-item d-flex align-items-center gap-2">
                        <i class="fa fa-envelope mr-1"></i>
                        <span>burraq@burraq.org</span>
                    </li>
                </ul>
            </div>

            <div class="col d-flex justify-content-end">
                <a href="{{ route("enroll.index")  }}" class="btn btn-sm btn-light fw-semibold text-primary">
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
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-black"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Trainings
                    </a>

                   <ul class="dropdown-menu dropdown-menu-right shadow-lg border-0 animate-dropdown scrollable-dropdown">
                        <li class="dropdown-header text-uppercase small text-muted">
                            Trainings
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        @foreach(\App\Models\Category::latest()->get() as $category)
                            <li>
                                <a class="dropdown-item fw-semibold py-2" href={{ route("categories.show", ["slug" => $category->slug ?? 'web']) }}>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </li>

                {{-- Blogs --}}
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route("all_public_posts") }}">Blogs</a>
                </li>

                {{-- Studetn Verificaton --}}
                <li class="nav-item">
                    <a class="nav-link text-black" href="{{ route("certificate.verify.form") }}">Student Verification</a>
                </li>

                {{-- Contact Dropdown --}}
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-black"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Contact
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right shadow-lg border-0 animate-dropdown scrollable-dropdown">
                        <li class="dropdown-header text-uppercase small text-muted">
                            Contact
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item fw-semibold py-2" href="{{ route('job_app_get') }}">
                                Apply For Job
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item fw-semibold py-2" href="{{ route('internship_apply_get') }}">
                                Apply For Internship
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item fw-semibold py-2" href="{{ route('webinar.apply') }}">
                                Apply For Webinar
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item fw-semibold py-2" href="{{ route('ambassador.apply') }}">
                                Become Our Ambassador
                            </a>
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
            <form class="d-flex" role="search" method="GET" action="{{ route('courses.search') }}">
            <input
                class="form-control me-2 rounded-pill"
                type="search"
                name="q"
                placeholder="Search Course"
                aria-label="Search"
            >
            <button class="btn btn-dark rounded-pill ml-1" type="submit">
                <span class="fa fa-search"> </span>
            </button>
            </form>

        </div>


        <div class="d-md-flex align-items-md-center justify-content-md-end">
            @if (Route::has('login'))
                @auth
                    <div class="dropdown mx-3">
                        @if (config('setting.login_profile'))
                            <div class="cursor_pointer text-center  pt-2" id="user_menu" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img height="40" width="40" class="rounded-circle object-cover"
                                    src="@include('modals.profile_logo')" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif
                            <div class="dropdown-menu dropdown-menu-right  w-55 mr-4 border" aria-labelledby="user_menu">
                                <a style="font-size: 0.9rem !important" class="pt-2  dropdown-item" href="{{ route('admin.course.index') }}">
                                    <i class="fa fa-book" aria-hidden="true"></i> Courses
                                </a>
                                <a style="font-size: 0.9rem !important" class="pt-2  dropdown-item" href="/user_logout">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                </a>
                            </div>
                        </div>
                @else
                    <div class="d-flex justify-content-end align-content-center ml-1">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary mr-1 rounded-pill">Log in</a>
                    </div>
                @endif
            @endif
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
    @include('admin.footer')
</body>

</html>
