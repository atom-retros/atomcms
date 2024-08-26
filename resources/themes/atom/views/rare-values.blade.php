@extends('layouts.app')

@push('title', __('Rare values'))

@section('content')
    <div class="flex flex-col col-span-12 gap-3">
        <pre class="p-3 overflow-x-auto text-sm text-gray-800 bg-gray-100 rounded dark:text-white dark:bg-gray-900">{{ $categories }}</pre>
    </div>
@endsection