@extends('header')

@section('content')
    <div class="container my-5">
        @include('messages')
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header text-center font-weight-bold">
                            Ambassador Application
                        </div>

                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('ambassador.store') }}">
                                @csrf

                                <input class="form-control mb-2" name="name" placeholder="Name" required>
                                <input class="form-control mb-2" name="father_name" placeholder="Father Name" required>
                                <input class="form-control mb-2" name="email" placeholder="Email">
                                <input class="form-control mb-2" name="phone" placeholder="Phone" required>
                                <input class="form-control mb-2" name="qualification" placeholder="Qualification" required>
                                <input class="form-control mb-2" name="field" placeholder="Field of Ambassador" required>

                                <textarea class="form-control mb-2" name="address" placeholder="Address" required></textarea>

                                <div class="mb-3">
                                    @include('file', ['name' => 'photo'])
                                </div>

                                <button class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
