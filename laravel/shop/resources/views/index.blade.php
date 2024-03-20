@extends('layout')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('home_page') }}">
                    Home
                </a>
                <span class="breadcrumb-item active">
                    Shop
                </span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- category Start -->
            <h5 class="section-title position-relative text-uppercase mb-3">
                <span class="bg-secondary pr-3">
                    Filter by category
                </span>
            </h5>
            <div class="bg-light p-4 mb-30">
                <form action="{{ route('filter_by_category') }}" method="GET">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input name="0" type="checkbox" value="0" class="custom-control-input" checked id="price-all">
                        <label class="custom-control-label" for="price-all">
                            All Category
                        </label>
                        <span class="badge border font-weight-normal">
                            {{ $products->count() }}
                        </span>
                    </div>
                    @foreach ($category as $item)
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input name="{{ $item->id }}" value="{{ $item->id }}" type="checkbox"
                            class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1">
                            {{ $item->name }}
                        </label>
                        <span class="badge border font-weight-normal">
                            {{ $item->products->count() }}
                        </span>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary px-3 d-flex justify-content-end">
                        Filter
                    </button>
                </form>
            </div>
            <!-- Category End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                @foreach ($products as $product)
                <div onmouseover="Check({{ $product->id }})" class="col-lg-4 col-md-6 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ $product->img }}" alt="{{ $product->img }}">
                            <div class="product-action">
                                <button id="cart{{ $product->id }}" onclick="Put_to_Cart({{ $product->id }})"
                                    class="btn btn-outline-dark btn-square">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                <button id="like{{ $product->id }}" onclick="Put_to_Liked({{ $product->id }})"
                                    class="btn btn-outline-dark btn-square">
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
                    {{$products->links()}}
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

@endsection