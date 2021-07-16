@extends('layouts.html')

@section('content')
    <div class="container bg-light rounded mb-3 p-3">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>預覽圖</th>
                    <th>中文名稱</th>
                    <th>英文名稱</th>
                    <th>mvp</th>
                    <th>效果</th>
                    <th>裝備</th>
                    <th>價格</th>
                    <th>庫存數量</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td><img class="w-25" src="{{ asset($product->image_url) }}"></td>
                        <td>{{ $product->cht_name }}</td>
                        <td>{{ $product->en_name }}</td>
                        <td>{{ $product->mvp }}</td>
                        <td>{{ $product->content }}</td>
                        <td>{{ $product->equipment }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="w-25 ">
                            <button type="button" class="upload_image btn btn-primary" data-id="{{ $product->id }}" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                上傳圖片
                            </button>
                            <button class="upload_content btn btn-success">編輯資料</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container text-center">
            @for ($i = 1; $i <= 2; $i++)
                @if ($i != $currentPage)
                    <a class="text-decoration-none btn btn-lg btn-outline-primary" href="admin?page={{ $i }}">
                        <div class="d-inline">{{ $i }}</div>
                    </a>
                @else
                    <div class="d-inline btn btn-lg btn-primary">{{ $i }}</div>
                @endif
            @endfor
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder" id="exampleModalLabel">商品圖片上傳</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="uploadImage" method="post" enctype="multipart/form-data">
                        <input type="file" name="product_image" id="product_image">
                        <input type="hidden" name="product_id" id="product_id">
                        <input type="submit" class="btn btn-primary float-end" value="送出">
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
