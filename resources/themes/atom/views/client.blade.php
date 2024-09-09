@extends('layouts.game')

@push('title', __('Nitro'))

@push('scripts')
    @vite(sprintf('resources/themes/%s/js/src/flash.js', $settings->get('theme')), 'build')
@endpush

@section('content')
    <iframe id="nitro" src="{{ $url }}" class="w-screen h-screen" frameborder="0"></iframe>
    <x-client.disconnect />
@endsection