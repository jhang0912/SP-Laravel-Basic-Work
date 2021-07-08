@extends('layout.html')

@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($products as $product)
            <div class="card col-3">
                <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ $product->en_name }}">
                <div class="card-body">
                    <div class="card-title h4">{{ $product->cht_name }}卡片</div>
                    <div class="card-text">效果：{{ $product->content }}</div>
                    <div class="card-text">裝備：{{ $product->equipment }}</div>
                    <div class="card-text">價格：{{ $product->price }} Z</div>
                    {{-- <button type="button" class="upload_image btn btn-primary" data-id="{{ $product->id }}"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        上傳圖片
                    </button> --}}
                </div>
            </div>
        @endforeach
        @foreach ($mvp_products as $mvp_product)
            <div class="card col-3">
                <img src="{{ asset($mvp_product->image_url) }}" class="card-img-top" alt="{{ $mvp_product->en_name }}">
                <div class="card-body">
                    <div class="card-title h4">{{ $mvp_product->cht_name }}卡片 <span
                            class="border border-2 border-warning rounded fw-bolder h6 text-warning">MVP</span></div>
                    <div class="card-text">效果：{{ $mvp_product->content }}</div>
                    <div class="card-text">裝備：{{ $mvp_product->equipment }}</div>
                    <div class="card-text">價格：{{ $mvp_product->price }} Z</div>
                    {{-- <button type="button" class="upload_image btn btn-primary" data-id="{{ $mvp_product->id }}"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                        上傳圖片
                    </button> --}}
                </div>
            </div>
        @endforeach
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
