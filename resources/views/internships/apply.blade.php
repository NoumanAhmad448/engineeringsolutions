@extends('header')

@section('content')
    <div class="container my-5">
        @include("messages")
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-header text-center font-weight-bold">
                        Apply for Internship
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('internship.store') }}">
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

                            {{-- Google Captcha if needed --}}
                            {{-- {!! NoCaptcha::display() !!} --}}

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
