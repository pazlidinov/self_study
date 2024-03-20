@extends('layout')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('home_page')}}">
                    Home
                </a>
                <a class="breadcrumb-item text-dark" href="{{ route('index') }}">
                    Shop
                </a>
                <span class="breadcrumb-item active">
                    Liked
                </span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">

        <!-- Shop Product Start -->
        <div class="col-12">
            <div class="row pb-3">
                @foreach ($products as $product)
                <div onmouseover="Check({{ $product->id }})" class="col-lg-4 col-md-6 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ $product->img }}" alt="{{ $product->img }}">
                            <div class="product-action">
                                <button id="cart{{ $product->id }}" onclick="Put_to_Cart({{ $product->id }})"
                                    class="btn btn-outline-dark btn-square" href="">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button id="like{{ $product->id }}" onclick="Put_to_Liked({{ $product->id }})"
                                    class="btn btn-outline-dark btn-square" href="">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{ route('show', $product->id) }}">
                                {{ $product->name }}
                            </a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>
                                    ${{ $product->getDiscountPriceAttribute() }}
                                </h5>
                                <h6 class="text-muted ml-2">
                                    <del>
                                        ${{ $product->price }}
                                    </del>
                                </h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small>
                                    {{ $product->view }} Reviews
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
@endsection