@extends('layouts.app')

@push('title', __('Welcome to the best hotel on the web!'))

@section('content')
    <div class="flex flex-col col-span-12 gap-3">
        <pre class="p-3 overflow-x-auto text-sm text-gray-800 bg-gray-100 rounded dark:text-white dark:bg-gray-900">{{ auth()->user() }}</pre>

        @if ($articles->count())
            <pre class="p-3 overflow-x-auto text-sm text-gray-800 bg-gray-100 rounded dark:text-white dark:bg-gray-900">{{ $article }}</pre>
        @endif

        <pre class="p-3 overflow-x-auto text-sm text-gray-800 bg-gray-100 rounded dark:text-white dark:bg-gray-900">{{ $friends }}</pre>

        <pre class="p-3 overflow-x-auto text-sm text-gray-800 bg-gray-100 rounded dark:text-white dark:bg-gray-900">{{ $referrals->count() }}</pre>

        {{-- @todo - Discord --}}
    </div>
@endsection