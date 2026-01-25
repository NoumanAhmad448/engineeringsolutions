@extends('header')

@section('content')
    <x-company_info_container title="Enroll Now">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="h1">Job Application</div>
                    <div class="card">

                        <div class="card-body">
                            @include('messages')

                            <form method="POST" action="{{ route('job_app_post') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Email (optional)</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Apply For *</label>
                                    <input type="text" name="apply_for" class="form-control"
                                        placeholder="e.g. Frontend Developer" required>
                                </div>

                                <div class="form-group">
                                    <label>Upload CV (PDF / Image) *</label>
                                    @include('file', ['name' => 'cv'])
                                </div>
                                @if (app()->environment(config('app.live_env')))
                                    {

                                    {{-- Google reCAPTCHA --}}
                                    <div class="form-group mt-3">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @error('g-recaptcha-response')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endif

                                <button class="btn btn-primary mt-3">
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
