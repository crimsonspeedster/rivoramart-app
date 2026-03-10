<div class="my-3 size-section">
    <span class="font-weight-bold text-secondary">{{$data['attribute']->title}}:</span>

    @if($data['terms']->isNotEmpty())
        <div class="size-custom-radios mt-2">
            @foreach($data['terms'] as $block)
                <a href="{{route('slug.resolver', $block['product']->sluggable->slug)}}" class="size-item">
                    <label>
                        <span>{{$block['term']->title}}</span>
                    </label>
                </a>
            @endforeach
        </div>
    @endif
</div>
