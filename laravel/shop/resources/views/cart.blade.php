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
                        Shopping Cart
                    </span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <form action="{{ route('create_order') }}" method="post" enctype="multip">
        @csrf
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($products as $product)
                                <tr id="product{{ $product->id }}">
                                    <td class="align-middle">
                                        <img src="{{ $product->img }}" alt="{{ $product->img }}" style="width: 50px;">
                                        {{ $product->name }}
                                    </td>
                                    <td id="" class="align-middle price">
                                        {{ $product->getDiscountPriceAttribute() }}
                                    </td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input id="count{{ $product->id }}" name="{{ $product->id }}" type="text"
                                                class="form-control form-control-sm bg-secondary border-0 text-center"
                                                value="1">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle product_total_price">
                                        {{ $product->getDiscountPriceAttribute() }}
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" onclick="Drop_from_cart({{ $product->id }})"
                                            class="btn btn-sm btn-danger drop_product">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="mb-30" action="">
                        <h5 class="section-title position-relative text-uppercase mb-3">
                            <span class="bg-secondary pr-3">
                                Phone number
                            </span>
                        </h5>
                        <div class="input-group">
                            <input type="tel" name="phone_number" onkeyup="Check_phone_number()"
                                class="form-control border-0 p-4" placeholder="Phone number">
                        </div>
                    </div>
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">
                            Cart Summary
                        </span>
                    </h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>
                                    Subtotal
                                </h6>
                                <h6 id='subtotal'></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">
                                    Shipping
                                </h6>
                                <h6 class="font-weight-medium">
                                    10
                                </h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>
                                    Total
                                </h5>
                                <h5 id="total"></h5>
                            </div>
                            <button id="submit" type="submit"
                                class="btn btn-block btn-primary font-weight-bold my-3 py-3" disabled>
                                Proceed To Checkout
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>

    <!-- Cart End -->

    <!-- Script to send request for droping product
        from cart product in session of user -->
    <script src="/js/cart.js"></script>

    <!-- Script to Check that the phone number is
        entered in the correct order-->
    <script src="/js/phone_number.js"></script>
@endsection
