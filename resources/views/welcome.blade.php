@extends('admin.admin_main')
@section('page-css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .amount-orange {
            color: #fd7e14
        }
    </style>
@endsection
@section('content')
    <section class="w-100 p-0">
        <!-- Full-width container -->
        <div class="container-fluid p-0 position-relative" style="height: 10vh; min-height: 500px;">
            <img src="{{ asset('img/hero-image.png') }}" alt="Burraq Engineering Solutions" class="w-100 h-100"
                style="object-fit: contain; object-position: center;" />
        </div>
    </section>

    <section class="py-5">
        <div class="container">

            {{-- Top text --}}
            <div class="text-center mb-5">
                <h2 class="fw-bold">Our Courses</h2>
                <p class="text-muted mt-3">
                    BES is a Technical Training Institute in Lahore that is providing
                    advance Autocad training course, Etap online training Course,
                    Best primavera p6 training & PLC SCADA Course.
                </p>
            </div>

            {{-- Course cards --}}
            <div class="row justify-content-center g-4">
                @foreach ($courses as $course)
                    <div class="col-md-4">
                        <div class="card h-100 text-center shadow-sm border-0">

                            {{-- Image --}}
                            <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="card-img-top"
                                width="400" height="300">

                            {{-- Body --}}
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-semibold">
                                    {{ $course->title }}
                                </h5>

                                <p class="card-text text-muted">
                                    {{ $course->description }}
                                </p>

                                {{-- Button --}}
                                <div class="mt-auto">
                                    <a href="{{ url('/courses/' . $course->slug) }}" class="btn btn-outline-primary btn-sm">
                                        All Courses
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="py-5 bg-primary">
        <div class="container">

            {{-- Section header --}}
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 text-center text-white">
                    <h2 class="fw-bold mb-3">Burraq Engineering Solutions</h2>
                    <p class="fs-5 fw-semibold">
                        A Trusted Name in Automation & Electrical Training
                    </p>
                </div>
            </div>

            {{-- Main content centered in a card --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">

                            {{-- Highlight statement --}}
                            <div class="p-4 mb-4 border-start border-4 border-primary bg-light rounded">
                                <p class="mb-0 fs-5 fw-semibold text-dark text-center">
                                    BES is a Technical Training Institute providing professional
                                    training services in the fields of Automation and Short Electrical Courses.
                                </p>
                            </div>

                            {{-- Detailed description --}}
                            <p class="text-muted mb-0" style="line-height: 1.8;">
                                Burraq Engineering Solutions specializes in electrical automation
                                and electrical engineering training. With over
                                <strong class="text-dark">8 years of industry experience</strong>,
                                we have proudly trained professionals from some of the most
                                respected organizations in Pakistan, including
                                <strong class="text-dark">
                                    IDAP, PAK NAVY, Pakistan Atomic Energy Commission,
                                    Fatima Group of Fertilizers, COMSATS, UOL, and UCP
                                </strong>.
                                <br><br>
                                Our mission is not only to train new engineers but also to
                                strengthen the engineering capabilities of our country by
                                delivering industry-ready skills and practical knowledge.
                            </p>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            {{-- Section header --}}
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center">
                    <h2 class="fw-bold mb-3">Our Team</h2>
                    <p class="text-muted fs-5">
                        Meet the professionals driving BES forward
                    </p>
                </div>
            </div>

            {{-- Leaders row --}}
            @if ($leaders && count($leaders) > 0)
                <div class="row justify-content-center mb-4">
                    @foreach ($leaders as $member)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border-0 shadow-sm text-center h-100">
                                <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" width="200"
                                    height="200" class="rounded-circle mt-3 mx-auto">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">{{ $member['name'] }}</h5>
                                    <p class="card-text text-muted">{{ $member['title'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Rest of the team --}}
            @if ($others && count($others) > 0)
                <div class="row justify-content-center">
                    @foreach ($others as $member)
                        <div class="col-md-3 col-lg-2 mb-4">
                            <div class="card border-0 shadow-sm text-center h-100">
                                <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" width="150"
                                    height="150" class="rounded-circle mt-3 mx-auto">
                                <div class="card-body">
                                    <h6 class="card-title fw-semibold">{{ $member['name'] }}</h6>
                                    <p class="card-text text-muted">{{ $member['title'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    <section class="py-5 bg-primary">
        <div class="container">
            <!-- Heading -->
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="fw-bold text-white">What are you looking for?</h2>
                    <p class="text-white-50">Frequently asked questions about our training programs</p>
                </div>
            </div>

            <!-- Accordion -->
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="accordion" id="faqAccordion">
                        <!-- Loop through FAQs -->
                        @foreach ($faqs as $index => $faq)
                            <div class="card">
                                <div class="card-header" id="heading{{ $faq['id'] }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                            data-target="#collapse{{ $faq['id'] }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $faq['id'] }}">
                                            {{ $faq['question'] }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $faq['id'] }}" class="collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $faq['id'] }}" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        {{ $faq['answer'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container">
            <!-- Section Header -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 text-center">
                    <h2 class="fw-bold">Explore Our Courses</h2>
                    <p class="text-muted">
                        Find the perfect course for your career journey
                    </p>
                </div>
            </div>

            <div class="row gy-4">
                @foreach ($courseGroups as $group)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-3">{{ $group['title'] }}</h5>
                                <ul class="list-unstyled">
                                    @foreach ($group['courses'] as $course)
                                        <li class="d-flex align-items-center mb-2">
                                            <span class="me-2 text-primary">•</span>
                                            <span class="text-dark">{{ $course }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
