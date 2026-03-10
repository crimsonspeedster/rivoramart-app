@if(!empty($reviews))
    <div class="row mb-4">
        <div class="col-lg-8 mb-4 order-lg-1">
            <div>
                @each('partials.review-element', $reviews, 'review')
            </div>

        </div>
        <div class="col-lg-4 mb-4 order-lg-2">
            <div class="d-flex flex-column flex-sm-column flex-md-row flex-lg-row px-5 px-sm-5 px-md-0 px-lg-0">
                <div class="row align-items-start g-4 flex-grow-1">
                    <div class="col-4 text-center">
                        <div class="rating-value">{{$product->rating}} <span class="rating-star">★</span></div>

                        <p class="text-muted">{{$product->comment_counts}} Reviews</p>
                    </div>

                    <div class="col-8">

                        @foreach(range(5,1) as $star)

                            @php
                                $count = $ratings[$star] ?? 0;
                                $percent = $totalReviews > 0 ? ($count / $totalReviews) * 100 : $totalReviews;
                            @endphp

                            <div class="d-flex align-items-center mb-2">

                                <div class="me-2" style="width:30px;">{{ $star }}★</div>

                                <div class="flex-grow-1">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: {{ $percent }}%"></div>
                                    </div>
                                </div>

                                <div class="ms-2 text-muted">{{ $count }}</div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </div>
@else
    <div>Nothing to show</div>
@endif
