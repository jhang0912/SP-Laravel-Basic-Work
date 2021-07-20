@extends('layouts.html')

@section('content')
    {{-- Orders Table --}}
    <div class="products-admin bg-light rounded mb-3 p-3">
        <table class="table">
            <thead>
                <tr>
                    <th>訂單ID</th>
                    <th>會員ID</th>
                    <th>總金額</th>
                    <th>訂單完成時間</th>
                    <th>狀態</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>${{ $order->total_price }}</td>
                        <td>{{ $order->created_at->format('Y/m/d H:i') }}</td>
                        <td>
                            @if ($order->deliveried == false)
                                未出貨
                            @elseif ($order->deliveried == true)
                                已出貨
                            @endif
                        </td>
                        <td>
                            <button type="button" class="update_data btn btn-primary" data-id="{{ $order->id }}"
                                data-bs-toggle="modal" data-bs-target="#order_{{ $order->id }}">
                                訂單資料
                            </button>
                            @if ($order->deliveried == false)
                                <button class="delivery btn btn-success">出貨</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container text-center">
            @for ($i = 1; $i <= $pages; $i++)
                @if ($i != $currentPage) <a class="text-decoration-none btn btn-lg
                btn-outline-primary" href="order?page={{ $i }}">
                <div class="d-inline">{{ $i }}</div>
                </a>
            @else
                <div class="d-inline btn btn-lg btn-primary">{{ $i }}</div> @endif
            @endfor
        </div>
    </div>

    {{-- Modal --}}
    @foreach ($orders as $order)
        <div class="modal fade" id="order_{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bolder" id="exampleModalLabel">訂單資料</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-start">會員ID：{{ $order->user_id }}</div>
                        <div class="text-start">會員姓名：{{ $order->user->name }}</div>
                        <div class="text-start">會員Email：{{ $order->user->email }}</div>
                        <table class="table border border-dark">
                            <thead>
                                <th>商品名稱</th>
                                <th>單價</th>
                                <th>數量</th>
                                <th>總價</th>
                            </thead>
                            @foreach ($order->cart_items as $cart_item)
                                <tr>
                                    <td>{{ $cart_item->products->cht_name }}卡片</td>
                                    <td>{{ $cart_item->products->price }}</td>
                                    <td>{{ $cart_item->quantity }}</td>
                                    <td>${{ $cart_item->quantity * $cart_item->products->price }}</td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <td colspan="4">結帳總金額：${{ $order->total_price }}</td>
                            </tfoot>
                        </table>
                        <div class="text-start"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- JavaScript --}}
    <script>
        $('.update_data').on('click', function() {
            let product_id = $(this).data('id')
            $('#product_id').val(product_id)
        })
    </script>
@endsection
