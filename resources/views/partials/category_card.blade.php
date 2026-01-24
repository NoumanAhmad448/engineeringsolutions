<div class="col-md-4 mb-4 d-flex justify-content-center">
    <div class="card category-card shadow-sm animate__animated animate__fadeInUp">
        <div class="card-img-wrapper">
            <img src="{{ img_path($category->image) }}" class="card-img-top img-hover-zoom" alt="{{ $category->name }}">
        </div>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text flex-grow-1">
                {{ Str::limit($category->description, 150, '...') }}
            </p>
            <a href="/categories/{{ $category->slug }}" class="btn btn-primary btn-sm mt-auto">All Courses</a>
        </div>
    </div>
</div>
