{{-- Leaders --}}
@if ($leaders->count())
    <h3 class="mb-3">Leadership</h3>
    <div class="row">
        @foreach ($leaders as $leader)
            <div class="col-md-4 mb-4">
                <div class="team-card text-center">
                    <img src="{{ $leader->image_path ? img_path($leader->image_path) : asset('img/employee.png') }}" class="img-fluid mb-2">
                    <h5>{{ $leader->name }}</h5>
                    <p>{{ $leader->jobTitle->title }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif

{{-- Team Members --}}
@if ($members->count())
    <h3 class="mb-3 mt-4">Our Team</h3>
    <div class="row">
        @foreach ($members as $member)
            <div class="col-md-3 mb-4">
                <div class="team-card text-center">
                    <img src="{{ $member->image_path ? img_path($member->image_path) : asset('img/employee.png') }}" class="img-fluid mb-2">
                    <h6>{{ $member->name }}</h6>
                    <p>{{ $member->jobTitle->title }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endif
