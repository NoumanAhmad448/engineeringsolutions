@php
    use Illuminate\Support\Facades\Route;
@endphp

@if (Route::currentRouteName() !== 'login')
    <footer class="border-t bg-white">
        <div class="bg-primary text-light pt-5">
            <div class="container">
                <div class="row gy-4">

                    <!-- Column 1: Logo + Description -->
                    <div class="col-md-4">
                        <img src="{{ asset('img/logo.png') }}" alt="Burraq Engineering Solutions" width="100"
                            height="100" class="mb-3" />
                        <p class="small fw-semibold">
                            Burraq Engineering Solutions is a Technical Training Institute in Lahore providing services
                            and training in Electrical Automation, Electrical Engineering, and IT fields.
                        </p>
                    </div>

                    <!-- Column 2: Office Info -->
                    <div class="col-md-4">
                        <h5 class="fw-bold mb-3">Main Office</h5>
                        <ul class="list-unstyled small">
                            <li class="mb-2">
                                <i class="fa fa-phone me-2"></i>
                                <strong>0317-1170280</strong>
                            </li>
                            <li class="mb-2">
                                <i class="fa fa-envelope me-2"></i>
                                <strong>burraq@burraq.org</strong>
                            </li>
                            <li class="mb-2">
                                <i class="fa fa-clock-o me-2"></i>
                                <strong>MON–SAT 09:00 – 21:00</strong>
                            </li>
                            <li>
                                <i class="fa fa-map-marker me-2"></i>
                                <strong>23 B Wahdat Road Near Abrar Center, Lahore</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <x-google_form />
                    </div>

                </div>

                <!-- Bottom bar -->
                <hr class="border-secondary my-4" />
                <div class="text-center small pb-3">
                    &copy; {{ now()->year }} Burraq Engineering Solutions. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
@endif

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('page-js')
</body>

</html>
