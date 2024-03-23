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
                <a class="breadcrumb-item text-dark" href="{{ route('index') }}">
                    Shop
                </a>
                <span class="breadcrumb-item active">
                    Shop Detail
                </span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Detail Start -->
<div  class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{ $product->img }}" alt="Image">
                    </div>
                    @foreach ($product->images as $image)
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="{{ $image->img }}" alt="Image">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>
                    {{ $product->name }}
                </h3>
                <div class="d-flex mb-3">
                    <small class="pt-1">
                        {{ $product->view }} Reviews
                    </small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">
                    ${{ $product->getDiscountPriceAttribute() }}
                </h3>
                <p class="mb-4">
                    {{ $product->title }}
                </p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">
                        Sizes:
                    </strong>
                    <label for="size-1">
                        {{ $product->size }}
                    </label>
                </div>
                <div id="add_to_cart"  class="d-flex align-items-center mb-4 pt-2">
                    <input type="hidden" value="{{$product->id}}">
                    <button  onclick="Put_to_Cart({{$product->id}})" class="btn btn-primary px-3">
                        <i class="fa fa-shopping-cart mr-1"></i>
                        Add To Cart
                    </button>
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">
                        Share on:
                    </strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="https://www.facebook.com/">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="https://twitter.com/">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="https://www.linkedin.com/">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">
                        Information
                    </a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">
                        Reviews ({{ $product->comments->count() }})
                    </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">
                            Product Information
                        </h4>
                        <p>
                            {{ $product->descriptions }}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">
                                    {{ $product->comments->count() }} review for
                                    "{{ $product->name }}"
                                </h4>
                                @foreach ($product->comments as $comment)
                                <div class="media mb-4">
                                    <img src="/img/default_person_image.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                        style="width: 45px;">
                                    <div class="media-body">
                                        <h6>
                                            {{ $comment->user_name }}
                                            <small>
                                                <i>{{ $comment->created_at }}</i>
                                            </small>
                                            <p>
                                                {{ $comment->comment }}
                                            </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">
                                    Leave a review
                                </h4>
                                <small>
                                    Your phone number will not be published. Required fields are marked *
                                </small>
                                <form action="{{ route('create_comment', $product->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">
                                            Your Name *
                                        </label>
                                        <input type="text" name="name" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">
                                            Your Review *
                                        </label>
                                        <textarea id="message" name="comment" cols="30" rows="5" class="form-control">
                                        </textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">
            You May Also Like
        </span>
    </h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @foreach ($like_products as $like_product)
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ $like_product->img }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <a class="btn btn-outline-dark btn-square" href="">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ $like_product->name }}
                        </a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>
                                ${{ $like_product->getDiscountPriceAttribute() }}
                            </h5>
                            <h6 class="text-muted ml-2">
                                <del>
                                    ${{ $like_product->price }}
                            </h6>
                        </div>
                        <small>
                            {{ $like_product->view }} Reviews
                        </small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Products End -->

@endsection