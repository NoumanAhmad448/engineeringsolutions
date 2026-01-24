@extends('header')

@section('content')
    <div class="container my-5">
        @include('messages') <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header text-center font-weight-bold">
                        Apply for Webinar
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('webinar.store') }}">
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Email (optional)</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Webinar Applied For</label>
                                <select name="webinar_id" class="form-control" required>
                                    <option value=""> -- Select Webinar -- </option>
                                    @foreach ($webinars as $webinar)
                                        <option value="{{ $webinar->id }}">
                                            {{ $webinar->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    @if (app()->environment(config("app.live_env"))) {
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
@endsection
