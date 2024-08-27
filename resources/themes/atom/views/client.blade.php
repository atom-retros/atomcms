@extends('layouts.game')

@push('title', __('Nitro'))

@section('content')
    <iframe src="{{ $url }}" class="w-screen h-screen" frameborder="0"></iframe>
@endsection