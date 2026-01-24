@php
    $fullStars = floor($rating);
    $halfStar = $rating - $fullStars >= 0.5;
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
@endphp
@for ($i = 0; $i < $fullStars; $i++)
    <i class="fa fa-star text-warning"></i>
@endfor

@if ($halfStar)
    <i class="fa fa-star-half-o text-warning"></i>
@endif

@for ($i = 0; $i < $emptyStars; $i++)
    <i class="fa fa-star-o text-warning"></i>
@endfor


<span class="ms-1 text-muted small">
    ({{ number_format($rating, 1) }})
</span>
