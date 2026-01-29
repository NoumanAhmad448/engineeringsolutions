@php
$menuGroups = [
    [
        'title' => 'Courses',
        'icon'  => 'fa-book',
        'items' => [
            [
                'title' => 'Categories',
                'route' => route('admin.category.index'),
                'icon'  => 'fa-tags',
                'access_roles' => [],
            ],
            [
                'title' => 'Courses',
                'route' => route('admin.course.index'),
                'icon'  => 'fa-tags',
                'access_roles' => [],
            ],
        ],
    ],

    [
        'title' => 'Team & Users',
        'icon'  => 'fa-users',
        'items' => [
            [
                'title' => 'Team Members',
                'route' => route('admin.team'),
                'icon'  => 'fa-users',
                'access_roles' => [],
            ],
            [
                'title' => 'Users',
                'route' => route('admin.user.index'),
                'icon'  => 'fa-users',
                'access_roles' => ['admin'],
            ],
            [
                'title' => 'Deleted Users',
                'route' => route('admin.user.index', ['type' => 'deleted']),
                'icon'  => 'fa-user-times',
                'access_roles' => ['admin'],
            ],
        ],
    ],

    [
        'title' => 'Applications',
        'icon'  => 'fa-file',
        'items' => [
            [
                'title' => 'Enroll Requests',
                'route' => route('admin.enrollments'),
                'icon'  => 'fa-user-plus',
                'access_roles' => [],
            ],
            [
                'title' => 'Job Applications',
                'route' => route('job_app_admin'),
                'icon'  => 'fa-briefcase',
                'access_roles' => [],
            ],
            [
                'title' => 'Internship Applications',
                'route' => route('internshp_application.admin'),
                'icon'  => 'fa-graduation-cap',
                'access_roles' => [],
            ],
            [
                'title' => 'Ambassador Applications',
                'route' => route('admin.ambassador.index'),
                'icon'  => 'fa-star',
                'access_roles' => [],
            ],
        ],
    ],

    [
        'title' => 'Events',
        'icon'  => 'fa-calendar',
        'items' => [
            [
                'title' => 'Manage Webinars',
                'route' => route('admin.webinar.index'),
                'icon'  => 'fa-video',
                'access_roles' => [],
            ],
            [
                'title' => 'Webinar Applications',
                'route' => route('admin.webinar_applications.index'),
                'icon'  => 'fa-list',
                'access_roles' => [],
            ],
        ],
    ],

    [
        'title' => 'Settings',
        'icon'  => 'fa-cog',
        'items' => [
            [
                'title' => 'Manage Internship',
                'route' => route('internships.index'),
                'icon'  => 'fa-cogs',
                'access_roles' => [],
            ],
            [
                'title' => 'Top Notification',
                'route' => route('s_info_user'),
                'icon'  => 'fa-bell',
                'access_roles' => [],
            ],
        ],
    ],
];
@endphp
@foreach ($menuGroups as $gIndex => $group)
    <li class="nav-item dropdown text-center px-3">

        <a class="navbar-text text-white dropdown-toggle"
           href="#"
           id="menuDropdown{{ $gIndex }}"
           role="button"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false">

            <i class="fa {{ $group['icon'] }} d-block mb-1"></i>
            <small>{{ $group['title'] }}</small>
        </a>

        <div class="dropdown-menu dropdown-menu-right shadow-sm"
             aria-labelledby="menuDropdown{{ $gIndex }}">

            @foreach ($group['items'] as $index => $item)
                @if (
                    empty($item['access_roles']) ||
                    in_array(auth()->user()->role, $item['access_roles']) ||
                    auth()->user()->is_admin
                )
                    <a class="dropdown-item d-flex align-items-center"
                       href="{{ $item['route'] }}"
                       data-index="{{ $index }}">

                        <i class="fa {{ $item['icon'] }} mr-2 text-primary"></i>
                        {{ $item['title'] }}
                    </a>
                @endif
            @endforeach

        </div>
    </li>
@endforeach
@php
$menuGroups = [
    // other groups ...

    [
        'title' => 'System',
        'icon'  => 'fa-cogs',
        'items' => [
            [
                'title' => 'Cron Jobs',
                'icon'  => 'fa-clock',
                'route' => route('cron-jobs.index'),
                'access_roles' => ['super-admin'], // 🔐 only super admin
            ],

            // future items
            // [
            //     'title' => 'Queue Monitor',
            //     'icon'  => 'fa-tasks',
            //     'route' => route('queue.index'),
            //     'access_roles' => ['super-admin'],
            // ],
        ],
    ],
];
@endphp
@foreach ($menuGroups as $gIndex => $group)
    <li class="nav-item dropdown text-center px-3">

        <a class="navbar-text text-white dropdown-toggle"
           href="#"
           id="menuDropdown{{ $gIndex }}"
           role="button"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false">

            <i class="fa {{ $group['icon'] }} d-block mb-1"></i>
            <small>{{ $group['title'] }}</small>
        </a>

        <div class="dropdown-menu dropdown-menu-right shadow-sm"
             aria-labelledby="menuDropdown{{ $gIndex }}">

            @foreach ($group['items'] as $index => $item)
                @if (
                    empty($item['access_roles']) ||
                    in_array(auth()->user()->role, $item['access_roles']) ||
                    auth()->user()->is_admin
                )
                    <a class="dropdown-item d-flex align-items-center"
                       href="{{ $item['route'] }}"
                       data-index="{{ $index }}">

                        <i class="fa {{ $item['icon'] }} mr-2 text-primary"></i>
                        {{ $item['title'] }}
                    </a>
                @endif
            @endforeach

        </div>
    </li>
@endforeach
