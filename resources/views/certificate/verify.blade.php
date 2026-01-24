@extends('header')

@section('content')
    <div class="container my-5">
        @include('messages')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center font-weight-bold">
                        Certificate Verification
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('certificate.verify.form') }}">
                            <input type="text" name="key" class="form-control mb-3"
                                placeholder="Enter Certificate Number (e.g. BES3456)" value="{{ $inputNumber ?? '' }}"
                                required>
                            <button class="btn btn-primary btn-block">Verify</button>
                        </form>

                        @if ($inputNumber && !$result)
                            <div class="alert alert-danger mt-3">
                                No record found for "{{ $inputNumber }}"
                            </div>
                        @endif

                        @if ($result)
                            @php
                                $enrolled = $result->enrolledCourse;
                                $student = $enrolled->student;
                                $course = $enrolled->course;
                            @endphp

                            <table class="table table-bordered mt-3">
                                <tr>
                                    <th>Certificate Number</th>
                                    <td>{{ $inputNumber }}</td>
                                </tr>
                                <tr>
                                    <th>Student Name</th>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <th>Father Name</th>
                                    <td>{{ $student->father_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $student->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $student->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Course Name</th>
                                    <td>{{ $course->name }}</td>
                                </tr>
                                <tr>
                                    <th>Admission Date</th>
                                    <td>{{ $enrolled->admission_date }}</td>
                                </tr>
                                <tr>
                                    <th>Enrollment Date</th>
                                    <td>{{ $enrolled->created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <th>Total Fee</th>
                                    <td>{{ $enrolled->total_fee }}</td>
                                </tr>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
