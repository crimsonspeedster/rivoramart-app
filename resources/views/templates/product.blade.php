@extends('layouts.app')


@section('main')
    <div class="product-details">
        <div class="container">
            <section class="mt-5">
                <div class="row">
                    <div class="col-12 col-lg-5 px-2 px-sm-2 px-md-2 px-lg-0">
                        <div class="product-container">
                            <!-- Thumbnails -->
                            <div class="thumbnail-wrapper">
                                <div class="thumb-arrow" id="thumbUp">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" width="24" height="24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                </div>
                                <div class="thumbnail-container" id="thumbContainer">
                                    <div class="thumbnail active" data-image="assets/images/product/1.png"><img
                                            src="assets/images/product/1.png" alt="Product 1"></div>
                                    <div class="thumbnail" data-image="assets/images/product/2.png"><img src="assets/images/product/2.png"
                                                                                                         alt="Product 2"></div>
                                    <div class="thumbnail" data-image="assets/images/product/3.png"><img src="assets/images/product/3.png"
                                                                                                         alt="Product 3"></div>
                                    <div class="thumbnail" data-image="assets/images/product/4.png"><img src="assets/images/product/4.png"
                                                                                                         alt="Product 4"></div>
                                    <div class="thumbnail" data-image="assets/images/product/5.png"><img src="assets/images/product/5.png"
                                                                                                         alt="Product 5"></div>
                                    <div class="thumbnail" data-image="assets/images/product/6.png"><img src="assets/images/product/6.png"
                                                                                                         alt="Product 6"></div>
                                </div>
                                <div class="thumb-arrow" id="thumbDown">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" width="24" height="24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Main Image with Magnifier -->
                            <div class="image-magnifier-container">
                                <div class="main-image-container" id="mainImageContainer">
                                    <img id="productImage" src="assets/images/product/1.png" alt="Product">
                                    <div class="magnifier-lens"></div>
                                </div>
                                <div class="magnifier-preview">
                                    <img src="assets/images/product/1.png" alt="Zoomed Product" id="zoomedImage">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-7 px-2 px-sm-2 px-md-2 px-lg-0">
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="mb-2 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <span>
                                        @for($i=0;$i<5;$i++)
                                            <span class="star-icon @if($i < $product->rating) text-warning @endif">&#9733;</span>
                                        @endfor
                                    </span>

                                    <small class="text-muted ms-2">({{$product->comment_counts}})</small>
                                </div>
                                <span class="badge badge-success p-2 text-white">
                In Stock
              </span>
                            </div>
                            <h1 class="h4 font-weight-semibold text-secondary">{{$product->title}}</h1>
                            <div class="my-2 d-flex align-items-center">
                                <span class="text-primary h5 font-weight-bold">
                                    ${{$product->price}}
                                </span>

                                @if($product->sale_price)
                                    <span class="text-muted ms-2">
                                        <s>${{$product->sale_price}}</s>
                                    </span>

                                    <span class="badge badge-danger px-2 ms-2">-25% off</span>
                                @endif
                            </div>

                            @if($product->short_description)
                                <div class="mb-3 border-bottom pb-3">
                                    <p class="text-truncate-3">
                                        {{$product->short_description}}
                                    </p>
                                </div>
                            @endif

                            <div class="my-3 size-section">
                                <span class="font-weight-bold text-secondary">Size:</span>
                                <div class="size-custom-radios mt-2">
                                    <div class="size-item">
                                        <input type="radio" id="size-s" name="size" value="s" checked="">
                                        <label for="size-s">
                                            <span>S</span>
                                        </label>
                                    </div>
                                    <div class="size-item">
                                        <input type="radio" id="size-m" name="size" value="m">
                                        <label for="size-m">
                    <span>
                      M
                    </span>
                                        </label>
                                    </div>
                                    <div class="size-item">
                                        <input type="radio" id="size-l" name="size" value="l">
                                        <label for="size-l">
                    <span>
                      L
                    </span>
                                        </label>
                                    </div>
                                    <div class="size-item">
                                        <input type="radio" id="size-xl" name="size" value="l">
                                        <label for="size-xl">
                    <span>
                      XL
                    </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 color-section">
                                <span class="font-weight-bold text-secondary">Colors:</span>
                                <div class="custom-radios mt-2">
                                    <div class="color-item">
                                        <input type="radio" id="color-1" name="color" value="#000" checked="">
                                        <label for="color-1">
                    <span style="--color: #000;">
                      <img src="./assets/images/icon/check-icn.svg" alt="Checked Icon">
                    </span>
                                        </label>
                                    </div>
                                    <div class="color-item">
                                        <input type="radio" id="color-2" name="color" value="#f1c40f">
                                        <label for="color-2">
                    <span style="--color: #f1c40f;">
                      <img src="./assets/images/icon/check-icn.svg" alt="Checked Icon">
                    </span>
                                        </label>
                                    </div>
                                    <div class="color-item">
                                        <input type="radio" id="color-3" name="color" value="#3e74c3c">
                                        <label for="color-3">
                    <span style="--color: #e74c3c;">
                      <img src="./assets/images/icon/check-icn.svg" alt="Checked Icon">
                    </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3">
                                <span class="font-weight-bold text-secondary">Quantity:</span>
                                <div class="d-flex mt-2">
                                    <div class="qty-container">
                                        <button class="qty-btn-minus count-decreament" type="button"><i class="fas fa-minus"></i></button>
                                        <input type="number" name="qty" value="1" class="input-qty input-cornered">
                                        <button class="qty-btn-plus count-increament" type="button"><i class="fas fa-plus"></i></button>
                                    </div>
                                    <div>
                                        <a href="cart.html" class="btn btn-primary btn-block ms-3 py-2"><i class="fa fa-shopping-cart"></i>
                                            <span class="d-none d-md-inline-block d-lg-inline-block">Add to cart</span></a>
                                    </div>
                                    <div>
                                        <a href="checkout.html" class="btn btn-danger btn-block ms-3 py-2"><i class="fa-solid fa-fire"></i>
                                            Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 border-bottom pb-3">
                                <a href="#" class="text-decoration-none"><i class="far fa-heart me-2"></i>Add to wishlist</a>
                            </div>

                            @if($product->manage_stock && $product->stock_status === \App\StockStatus::InStock )
                                <div class="my-3 d-flex align-items-center">
                                    <span class="font-weight-bold text-secondary">Available:</span>

                                    <span class="text-success ms-2">{{$product->stock}} items in Stock</span>
                                </div>
                            @endif

                            @if(!empty($product->categories))

                                <div class="my-3 category-tag">
                                    <span class="font-weight-bold text-secondary">Category:</span>

                                    @foreach($product->categories as $index => $category)
                                        <a href="{{route('slug.resolver', $category->sluggable->slug)}}" class="text-primary ml-1 text-decoration-none ">{{$category->title}}</a>

                                        @if($index < count($product->categories) - 1)
                                            ,
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            <div class="my-3 category-tag">
                                <span class="font-weight-bold text-secondary">Tags:</span>
                                <a href="#" class="text-primary ml-1 text-decoration-none ">Women Accessories,</a>
                                <a href="#" class="text-primary ml-1 text-decoration-none ">Jewellery</a>
                            </div>
                            <div class="my-3">
                                <span class="font-weight-bold text-secondary">Share:</span>
                                <div class="mt-2 d-flex align-items-center">
                                    <a href="#" class="btn btn-outline-primary me-2">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-dark me-2">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-success me-2">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section class="mt-50">
                <div class="product-detail-review">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills" id="myTab" role="tablist">
                                <!-- nav item -->
                                <li class="nav-item">
                                    <!-- btn -->
                                    <a class="nav-link active" id="product-tab1" data-bs-toggle="tab" data-bs-target="#product-tab-panel-1"
                                       href="#product-tab-panel-1" role="tab" aria-controls="product-tab-pane" aria-selected="true">
                                        Product Details
                                    </a>
                                </li>
                                <!-- nav item -->
                                <li class="nav-item">
                                    <!-- btn -->
                                    <a class="nav-link" id="product-tab2" data-bs-toggle="tab" data-bs-target="#product-tab-panel-2"
                                       href="#product-tab-panel-2" role="tab" aria-controls="product-tab-pane" aria-selected="true">
                                        More Information
                                    </a>
                                </li>
                            </ul>
                            <!-- tab content -->
                            <div class="tab-content" id="myTabContent">
                                <!-- tab pane -->
                                <div class="tab-pane fade show active" id="product-tab-panel-1" role="tabpanel"
                                     aria-labelledby="product-tab" tabindex="0">
                                    <div class="my-4">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quo assumenda asperiores atque nisi
                                            ipsa deleniti similique? Neque esse voluptate ipsa, sunt quas delectus amet vitae dignissimos
                                            incidunt nisi asperiores vel placeat cum quidem. Quasi voluptatem, recusandae quod eos deserunt
                                            animi libero optio totam labore officiis minus illo nemo maxime, sequi, magni voluptate nostrum
                                            aspernatur aperiam amet tempora possimus. Nisi aut, consectetur soluta culpa quos eius nostrum
                                            inventore. Officia quaerat cupiditate molestiae nihil. Eos sequi consectetur sapiente officiis sed.
                                            Minus, nostrum sequi? Id quaerat explicabo voluptatibus dolorum accusamus quis ipsam animi nostrum
                                            similique. Nobis, temporibus possimus laboriosam repellendus in excepturi?</p>
                                    </div>
                                </div>
                                <!-- tab pane -->
                                <div class="tab-pane fade" id="product-tab-panel-2" role="tabpanel" aria-labelledby="product-tab"
                                     tabindex="0">
                                    <div class="my-4">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                                <table class="table table-striped">
                                                    <!-- table -->
                                                    <tbody>
                                                    <tr>
                                                        <th>Weight</th>
                                                        <td>150 Grams</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Type</th>
                                                        <td>Gold</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Brand</th>
                                                        <td>Bhima Jewellers</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Package Quantity</th>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Manufacturer</th>
                                                        <td>Bhima Jewellers</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Net Quantity</th>
                                                        <td>340.0 Gram</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Product Dimensions</th>
                                                        <td>9.6 x 7.49 x 18.49 cm</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="my-5">
                <div class="related-product">
                    <div class="mb-4 d-flex align-items-center justify-content-between pb-2">
                        <h2 class="h4 font-weight-bold text-secondary position-relative pb-2 mb-0 section-title">
                            Related Items
                        </h2>
                    </div>
                    <div class="product mt-4">
                        <div class="owl-carousel owl-theme product-recommended-slider">
                            <div class="product-card">
                                <span class="badge-new bg-danger">Out of stock</span>
                                <span class="wishlist-icon"><i class="fas fa-heart"></i></span>
                                <a href="shop-single.html">
                                    <img src="assets/images/product/4.png" class="img-fluid mb-2 product-img" alt="product">
                                </a>
                                <h6><a href="shop-single.html">Lenovo Vibe S1 Lite</a></h6>
                                <div class="rating">
            <span class="d-flex align-items-center">
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
            </span>
                                </div>
                                <div>
                                    <span class="old-price">$20.00</span>
                                    <span class="price">$18.00</span>
                                    <span class="discount">-10%</span>
                                </div>
                                <button class="btn btn-primary cart-btn">Add to Cart</button>
                            </div>

                            <div class="product-card">
                                <span class="wishlist-icon"><i class="fas fa-heart"></i></span>
                                <a href="shop-single.html">
                                    <img src="assets/images/product/2.png" class="img-fluid mb-2 product-img" alt="product">
                                </a>
                                <h6><a href="shop-single.html">Mouse Lenovo</a></h6>
                                <div class="rating">
            <span class="d-flex align-items-center">
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
            </span>
                                </div>
                                <div>
                                    <span class="old-price">$20.00</span>
                                    <span class="price">$18.00</span>
                                    <span class="discount">-10%</span>
                                </div>
                                <button class="btn btn-primary cart-btn">Add to Cart</button>
                            </div>
                            <div class="product-card">
                                <span class="wishlist-icon"><i class="fas fa-heart"></i></span>
                                <a href="shop-single.html">
                                    <img src="assets/images/product/5.png" class="img-fluid mb-2 product-img" alt="product">
                                </a>
                                <h6><a href="shop-single.html">MI head phone</a></h6>
                                <div class="rating">
            <span class="d-flex align-items-center">
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
            </span>
                                </div>
                                <div>
                                    <span class="old-price">$20.00</span>
                                    <span class="price">$18.00</span>
                                    <span class="discount">-10%</span>
                                </div>
                                <button class="btn btn-primary cart-btn">Add to Cart</button>
                            </div>
                            <div class="product-card">
                                <span class="badge-new bg-danger">Out of stock</span>
                                <span class="wishlist-icon"><i class="fas fa-heart"></i></span>
                                <a href="shop-single.html">
                                    <img src="assets/images/product/6.png" class="img-fluid mb-2 product-img" alt="product">
                                </a>
                                <h6><a href="shop-single.html">Back cover for mi</a></h6>
                                <div class="rating">
            <span class="d-flex align-items-center">
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
            </span>
                                </div>
                                <div>
                                    <span class="old-price">$20.00</span>
                                    <span class="price">$18.00</span>
                                    <span class="discount">-10%</span>
                                </div>
                                <button class="btn btn-primary cart-btn">Add to Cart</button>
                            </div>
                            <div class="product-card">
                                <span class="badge-new bg-danger">Out of stock</span>
                                <span class="wishlist-icon"><i class="fas fa-heart"></i></span>
                                <a href="shop-single.html">
                                    <img src="assets/images/product/7.png" class="img-fluid mb-2 product-img" alt="product">
                                </a>
                                <h6><a href="shop-single.html">Lenovo Vibe S1 Lite</a></h6>
                                <div class="rating">
            <span class="d-flex align-items-center">
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
                <span class="star-icon text-warning">★</span>
            </span>
                                </div>
                                <div>
                                    <span class="old-price">$20.00</span>
                                    <span class="price">$18.00</span>
                                    <span class="discount">-10%</span>
                                </div>
                                <button class="btn btn-primary cart-btn">Add to Cart</button>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="mt5 review-section">
                <div class="mb-4 d-flex align-items-center justify-content-between pb-2">
                    <h2 class="h4 font-weight-bold text-secondary position-relative pb-2 mb-0 section-title">
                        Reviews ({{$product->comment_counts}})
                    </h2>
                    <div>
                        <a href="#" class="btn btn-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#reviewModal">
                            <svg class="me-1" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                 stroke-linecap="round" stroke-linejoin="round" height="16" width="16"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            Write a review
                        </a>
                    </div>
                </div>

                @php
                    $reviews = $product->reviews()->published()->get();
                @endphp

                @if(!empty($reviews))
                    <div class="row mb-4">
                        <div class="col-lg-8 mb-4 order-lg-1">
                            <div>
                                @foreach($reviews as $review)
                                    <div class="d-flex align-items-start mt-3">
                                        <figure class="d-none d-sm-block rounded-circle overflow-hidden shadow-sm"
                                                style="height: 56px; width: 56px; min-width: 56px;">
                                            <img class="img-fluid" src="./assets/images/client/1.png" alt="{{$review->user->name}}">
                                        </figure>

                                        <div class="ms-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="font-weight-bold text-primary">{{$review->user->name}}</span>

                                                <span class="text-muted ms-2">· {{ $review->published_at->format('d M. h:ia') }}</span>
                                            </div>

                                            <p class="mb-2">{{$review->comment}}</p>

{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <div class="d-flex align-items-center text-secondary cursor-pointer">--}}
{{--                                                    <svg class="me-1" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"--}}
{{--                                                         stroke-linecap="round" stroke-linejoin="round" height="16" width="16"--}}
{{--                                                         xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>--}}
{{--                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>--}}
{{--                                                    </svg>--}}
{{--                                                    <span>Edit</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                @endforeach
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
                                                $percent = $totalReviews ? ($count / $totalReviews) * 100 : 0;
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
                @endif
            </section>

        </div>
    </div>
@endsection
