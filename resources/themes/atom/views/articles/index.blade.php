@extends('layouts.app')

@push('title', __('Articles'))

@section('content')
    <div class="flex flex-col col-span-12 gap-3">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <x-article.list :articles="$articles" />
        </div>
    </div>
@endsection