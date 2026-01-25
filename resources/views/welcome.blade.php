@extends('header')
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
            <div id="categories" class="loader-container text-center my-5">
                <x-loader message="Loading Categories ..."/>
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

            <div class="loader-container" id="team-result">
                <x-loader message="Loading Team Member ..." />
            </div>

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


@section("page-js")
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $.ajax({
        url: "{{ route('ajax.categories') }}",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#categories').html(data.html);

            // Hover animation for cards
            $('#categories .hover-shadow').hover(
                function() { $(this).css('transform', 'translateY(-5px) scale(1.05)'); },
                function() { $(this).css('transform', 'translateY(0) scale(1)'); }
            );
        },
        error: function(err) {
            console.error(err);
        }
    });
});


function loadTeam() {

    $.ajax({
        url: "/team/list",
        type: "GET",
        success: function (html) {
            $("#team-result").html(html);
        },
        error: function () {
            alert("Failed to load team");
        }
    });
}

$(document).ready(function() {

loadTeam();
});
</script>
@endsection