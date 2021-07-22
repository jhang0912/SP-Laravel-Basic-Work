@extends('layouts.html')

@section('content')
<div class="container w-50 bg-light rounded p-3">
    <div class="text-center text-danger h2 p-1">
        <i class="fas fa-exclamation-triangle h2 me-1"></i>
        ERROR
        <i class="fas fa-exclamation-triangle h2 ms-1"></i>
        </div>
    <ul class="list-group">
        <li class="error-message list-group-item text-center h5">{{ $message }}</li>
    </ul>
</div>
@endsection

