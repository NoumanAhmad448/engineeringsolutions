@php

    $menuItems = [
        [
            'title' => 'Courses',
            'icon' => 'fa-book',
            'route' => route('admin.course.index'),
            'access_roles' => [],
        ],
        [
            'title' => 'Categories',
            'icon' => 'fa-tags',
            'route' => route('admin.category.index'),
            'access_roles' => [],
        ],
        [
            'title' => 'Job Applications',
            'icon' => 'fa-tags',
            'route' => route('job_app_admin'),
            'access_roles' => [],
        ],
        [
            'title' => 'Internship Applications',
            'icon' => 'fa-tags',
            'route' => route('internshp_application.admin'),
            'access_roles' => [],
        ],
        [
            'title' => 'Manage Internship',
            'icon' => 'fa-tags',
            'route' => route('internships.index'),
            'access_roles' => [],
        ],

        [
            'title' => 'Users',
            'icon' => 'fa-users',
            'route' => route('admin.user.index'),
            'access_roles' => ['admin'],
        ],

        [
            'title' => 'Deleted Users',
            'icon' => 'fa-user-times',
            'route' => route('admin.user.index', ['type' => 'deleted']),
            'access_roles' => ['admin'],
        ],
    ];

@endphp

@foreach ($menuItems as $index => $item)
    @if (empty($item['access_roles']) ? true : in_array(auth()->user()->role, $item['access_roles']) || auth()->user()->is_admin)
        <li class="nav-item text-center px-3">
            <!-- Loader -->
            <div class="py-3 menu-loader{{ $index }} d-none">
                <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                <div class="medium text-muted mt-1">Loading…</div>
            </div>

            <!-- Menu Link -->
            {{-- <a class="nav-link navbar-text text-white d-none menu-item" --}}
            <a class="navbar-text text-white d-none menu-item" href="{{ $item['route'] }}"
                data-index="{{ $index }}">
                @if (!empty($item['img']))
                    <img src="{{ asset('img/' . $item['img']) }}" alt="lyskills" class="img-fluid mx-auto d-block"
                        width="30">
                @else
                    <i class="fa {{ $item['icon'] }} d-block mb-1"></i>
                @endif
                <small>{{ $item['title'] }}</small>
            </a>
        </li>
    @endif
@endforeach

<x-super-admin>
    <li class="nav-item text-center px-3">
        <a class="navbar-text text-white d-none menu-item" href="{{ route('cron-jobs.index') }}">
            <i class="fa fa-user-times d-block mb-1"></i>
            <smal> Cron Jobs </small>
        </a>
    </li>
</x-super-admin>
