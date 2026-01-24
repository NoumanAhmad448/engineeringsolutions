<div class="container-fluid">
    <div class="row">
        @foreach ($categories as $category)
            @include('partials.category_card', ['category' => $category])
        @endforeach
    </div>
</div>
