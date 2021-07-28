@extends('layouts.html')

@section('content')
    <div class="container w-50 bg-light rounded p-3">
        <div class="text-center h2 p-1">通知</div>
        <div class="text-center h6">親愛的 {{ $member->name }} 先生/小姐，您好</div>
        <ul class="list-group">
            @foreach ($notifications as $key => $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    @if ($notification->read_at == null)
                        <button class="new-notification btn btn-sm btn-danger rounded"
                            data-id="{{ $notification->id }}" dusk="new-notification_{{ $key }}">new</button>
                    @else
                        <button class="readed-notification btn btn-sm btn-success rounded" dusk="readed-notification">readed</button>
                    @endif
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $notification->data['message'] }}</div>
                    </div>
                    <span class="me-2">{{ $notification->created_at->format('Y/m/d H:i') }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        $('.new-notification').on('click', function() {
            let notification_id = $(this).data('id');

            $.ajax({
                method: 'post',
                url: 'readedNotification',
                data: {
                    id: notification_id
                }

            })
            .done(function(){
                location.reload();
            })
        })
    </script>
@endsection
