<div class="container-fluid">
    <div class="row">
        @forelse($courses as $course)
            <div class="col-md-3 mb-4">
                <x-course_card :course="$course"/>
            </div>
        @empty
            <p class="text-muted">No courses found.</p>
        @endforelse
    </div>
</div>
