@extends('layouts.app')


@section('main')
    <section class="cart-section px-3">
        <div class="container mt-50 px-4">
            <div class="mb-6 row">
                <div class="col-12 col-lg-7 mb-4 mb-lg-0">
                    <div class="mb-4 row d-none d-sm-none d-md-none d-lg-block">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <b>Product</b>
                                </div>
                                <div class="col-lg-2">
                                    <b>Price</b>
                                </div>
                                <div class="col-lg-3">
                                    <b>Quantity</b>
                                </div>
                                <div class="col-lg-3">
                                    <b>Total</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="products mt-3">
                        <!-- Product 1 -->
                        <div class="position-relative product-item row mb-4 rounded-lg bg-white pt-3 shadow-sm mr-1">
                            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Product</b>
                                <div class=" d-flex w-100">
                                    <figure class="rounded-lg">
                                        <img  src="./assets/images/product/2.png" class="rounded" width="60" alt="img">
                                    </figure>
                                    <div class="ml-2 w-100">
                                        <a class="font-weight-bold text-dark" href="#" >
                                            Lorem, ipsum.
                                        </a>
                                        <div class="mt-2">
                                            <small>#PRD36585</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Price</b>
                                <div>
                                    <span class="font-weight-bold text-primary">$120.00</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Quantity</b>
                                <div class="qty-container">
                                    <button class="qty-btn-minus count-decreament" type="button"><i class="fas fa-minus"></i></button>
                                    <input type="number" name="qty" value="1" class="input-qty input-cornered">
                                    <button class="qty-btn-plus count-increament" type="button"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Total</b>
                                <span class="font-weight-bold text-primary">$120.00</span>
                            </div>
                            <button class="btn btn-primary position-absolute close-cart">
                                <svg  stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="20px" width="20px" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                        <!-- Product 2 -->
                        <div class="position-relative product-item row mb-4 rounded-lg bg-white pt-3 shadow-sm mr-1">
                            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Product</b>
                                <div class=" d-flex w-100">
                                    <figure class="rounded-lg">
                                        <img  src="./assets/images/product/2.png" class="rounded" width="60" alt="img">
                                    </figure>
                                    <div class="ml-2 w-100">
                                        <a class="font-weight-bold text-dark" href="#" >
                                            Lorem, ipsum.
                                        </a>
                                        <div class="mt-2">
                                            <small>#PRD36585</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Price</b>
                                <div>
                                    <span class="font-weight-bold text-primary">$120.00</span>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Quantity</b>
                                <div class="qty-container">
                                    <button class="qty-btn-minus count-decreament" type="button"><i class="fas fa-minus"></i></button>
                                    <input type="number" name="qty" value="1" class="input-qty input-cornered">
                                    <button class="qty-btn-plus count-increament" type="button"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-sm-3 mb-md-3 md-lg-0">
                                <b class="mb-2 d-block d-xl-none">Total</b>
                                <span class="font-weight-bold text-primary">$120.00</span>
                            </div>
                            <button class="btn btn-primary position-absolute close-cart" >
                                <svg  stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="20px" width="20px" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5  ps-lg-5">
                    <div class="delivery-summary">
                        <div class="mb-4 box-title d-flex flex-wrap align-items-center justify-content-between border-bottom-2  pb-1">
                            <h1 class="h4 font-weight-bold text-dark position-relative m-0 mb-1 title-under-line">
                                Order Total
                            </h1>
                        </div>
                        <form class="d-flex">
                            <div class="position-relative w-100">
                                <input type="text" id="code" class="form-control rounded-0" placeholder="Promo code" autocomplete="off">
                            </div>
                            <button class="btn btn-primary apply-coupon text-white rounded-0" type="submit">Apply</button>
                        </form>
                        <div class="mt-4 bg-white ">
                            <ul class="list-unstyled">
                                <li class="d-flex justify-content-between">
                                    Items <span class="text-dark">$690.00</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    Discount <span class="text-danger">-$330.00</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    Shipping <span class="text-dark">$8.00</span>
                                </li>
                                <li class="d-flex justify-content-between font-weight-bold text-uppercase text-dark">
                                    Total to pay <span>$368.00</span>
                                </li>
                            </ul>
                            <a href="checkout.html" class="btn btn-primary mt-2 w-100 text-center font-weight-bold custom-btn-p">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
