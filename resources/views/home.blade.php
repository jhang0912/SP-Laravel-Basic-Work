@extends('layouts.html')

@section('content')
    <div class="product-container d-flex flex-wrap justify-content-center align-items-center mt-2 p-3">
        <div class="normal-card d-flex flex-wrap justify-content-start align-items-center mb-4">
            <div class="container-fluid rounded bg-light h2 text-center mb-4 p-2">Card</div>
            @foreach ($products as $product)
                <div class="card col-6 col-lg-4 col-xl-3 d-flex flex-wrap justify-content-start align-items-start">
                    <img src="@if (isset($product->image)) {{ asset($product->image) }} @endif" class="card-img-top" alt="{{ $product->en_name }}">
                    <div class="card-body w-100">
                        <div class="card-name fw-bolder h5">{{ $product->cht_name }}卡片</div>
                        <div class="card-equipment h6">裝備：{{ $product->equipment }}</div>
                        <div class="card-price h6">售價：{{ $product->price }} Z</div>
                        <div class="card-quantity h6">數量：
                            <select class="form-select-sm" name="quantity" id="">
                                @for ($i = 1; $i <= $product->quantity; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="add_to_cart">
                            <button class="add-to-cart btn btn-sm btn-danger"><i
                                    class="fas fa-shopping-cart h6 text-white me-1 mb-0"></i>加入購物車
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mvp-card d-flex flex-wrap justify-content-start align-items-center">
            <div class="container-fluid rounded bg-light h2 text-center mb-4 p-2">MVP Card</div>
            @foreach ($mvp_products as $mvp_product)
                <div class="card col-6 col-lg-4 col-xl-3 d-flex flex-wrap justify-content-start align-items-start">
                    <img class="card-img-top" src="@if (isset($mvp_product->image)) {{ asset($mvp_product->image) }} @endif" alt="{{ $mvp_product->en_name }}">
                    <div class="card-body w-100">
                        <div class="card-name fw-bolder h5">{{ $mvp_product->cht_name }}卡片 <span
                                class="d-none d-xl-inline border border-2 border-warning rounded fw-bolder h6 text-warning">MVP</span>
                        </div>
                        <div class="card-equipment h6">裝備：{{ $mvp_product->equipment }}</div>
                        <div class="card-price h6">售價：{{ $mvp_product->price }} Z</div>
                        <div class="card-quantity h6">數量：
                            <select class="form-select-sm" name="quantity" id="">
                                @for ($i = 1; $i <= $mvp_product->quantity; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="add_to_cart">
                            <button class="add-to-cart btn btn-sm btn-danger"><i
                                    class="fas fa-shopping-cart h6 text-white me-1 mb-0"></i>加入購物車
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
