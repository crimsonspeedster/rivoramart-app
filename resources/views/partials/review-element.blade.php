<div class="d-flex align-items-start mt-3">
    <figure
            class="d-none d-sm-block rounded-circle overflow-hidden shadow-sm"
            style="height: 56px; width: 56px; min-width: 56px;"
    >
        <img
            class="img-fluid"
            src="./assets/images/client/1.png"
            alt="{{$review->user->name}}"
        >
    </figure>

    <div class="ms-3">
        <div class="d-flex align-items-center mb-2">
            <span class="font-weight-bold text-primary">{{$review->user->name}}</span>

            <span class="text-muted ms-2">· {{ $review->published_at->format('d M. h:ia') }}</span>
        </div>

        <p class="mb-2">{{$review->comment}}</p>
    </div>
</div>
