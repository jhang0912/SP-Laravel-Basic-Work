@extends('layouts.html')

@section('content')
    <div class="share-short-url bg-light rounded mb-3 p-3">
        <div class="text-center h3">分享</div>
        <div class="input-group">
            <input id="short-url" class="short-url form-control" type="text" value="{{ $url }}" readonly>
            <button class="copy-url btn btn-primary" dusk="copy-button">複製</button>
        </div>
    </div>

    <script>
        $('.copy-url').on('click', function() {
            let url = document.getElementById("short-url");
            url.select();
            document.execCommand("copy");
            alert("已將連結複製到剪貼簿");
        })
    </script>
@endsection
