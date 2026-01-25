@extends('header')

@section('content')
    <x-company_info_container title="Enroll Now">

        <div class="container-fluid my-5">
            @include('messages')
            <div class="h1">
                Apply for Internship
            </div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-12">
                            <form method="POST" action="{{ route('internship.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label>Email (optional)</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" required placeholder="Phone Number">
                                </div>

                                <div class="form-group">
                                    <label>Internship Applied For</label>
                                    <select name="internship_id" class="form-control" required>
                                        <option value=""> -- Select Internship -- </option>
                                        @foreach ($internships as $internship)
                                            <option value="{{ $internship->id }}">
                                                {{ $internship->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @if (app()->environment(config('app.live_env')))
                                    {
                                    {{-- Google captcha (enable when required) --}}
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                @endif

                                <button class="btn btn-primary btn-block">
                                    Submit Application
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-company_info_container>
@endsection
