@extends('layout.html')

@section('content')
    <style>
        .normal-card {
            width: 70vw
        }

        .mvp-card {
            width: 70vw
        }

    </style>
    <div class="product-container d-flex flex-wrap justify-content-center align-items-center bg-light shadow p-3 mt-4 mb-4">
        <div class="container-fluid h2 text-center">Card</div>
        <div class="normal-card d-flex flex-wrap justify-content-start align-items-center mb-2">
            @foreach ($products as $product)
                <div class="card col-6 col-lg-4 col-xl-3 d-flex flex-wrap justify-content-start align-items-start">
                    <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ $product->en_name }}">
                    <div class="card-body w-100">
                        <div class="card-name fw-bolder h5">{{ $product->cht_name }}卡片</div>
                        <div class="card-equipment h6">裝備：{{ $product->equipment }}</div>
                        <div class="card-price h6">售價：{{ $product->price }} Z</div>
                        {{-- <button type="button" class="upload_image btn btn-primary" data-id="{{ $product->id }}"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            上傳圖片
                        </button> --}}
                        <button class="add-to-cart btn btn-sm btn-danger float-end">加入購物車</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="container-fluid h2 text-center">MVP Card</div>
        <div class="mvp-card d-flex flex-wrap justify-content-start align-items-center">
            @foreach ($mvp_products as $mvp_product)
                <div class="card col-6 col-lg-4 col-xl-3 d-flex flex-wrap justify-content-start align-items-start">
                    <img src="{{ asset($mvp_product->image_url) }}" class="card-img-top"
                        alt="{{ $mvp_product->en_name }}">
                    <div class="card-body w-100">
                        <div class="card-name fw-bolder h5">{{ $mvp_product->cht_name }}卡片 <span
                                class="d-none d-xl-inline border border-2 border-warning rounded fw-bolder h6 text-warning">MVP</span>
                        </div>
                        <div class="card-equipment h6">裝備：{{ $mvp_product->equipment }}</div>
                        <div class="card-price h6">售價：{{ $mvp_product->price }} Z</div>
                        <button class="add-to-cart btn btn-sm btn-danger float-end">加入購物車</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="uploadImage" method="post" enctype="multipart/form-data">
                        <input type="file" name="product_image" id="product_image">
                        <input type="hidden" name="product_id" id="product_id">
                        <input type="submit" class="btn btn-primary" value="送出">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.upload_image').on('click', function() {
            let product_id = $(this).data('id')
            $('#product_id').val(product_id)
        })
    </script>
@endsection
