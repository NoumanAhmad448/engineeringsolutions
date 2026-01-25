@props([
    "show_payments" => false
])
<div class="container-fluid my-5">
    <div class="row no-gutters enroll-wrapper bg-primary text-white rounded shadow-lg flex-column flex-md-row">

        {{-- LEFT: Company Info --}}
        <div class="col-md-6 p-5">
            <x-contact_us/>

            <x-google_form />
            @include("frontend/payments")
        </div>


        {{-- RIGHT: DYNAMIC CONTENT --}}
        <div class="col-md-6 d-flex">
            <div class="bg-white text-dark p-4 w-100 m-4 rounded shadow">
                {{ $slot }}
            </div>
        </div>

    </div>
</div>
