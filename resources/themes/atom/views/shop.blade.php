@extends('layouts.app')

@push('title', __('Shop'))

@section('content')
    <div class="flex flex-col col-span-12 gap-3 md:col-span-3">
        <x-shop.categories :categories="$categories" />
    </div>

    <div class="flex flex-col col-span-12 gap-3 md:col-span-6">
        <x-shop.list :articles="$articles" />
    </div>

    <div class="flex flex-col col-span-12 gap-3 md:col-span-3">
        <x-shop.balance />
        <x-shop.voucher />
    </div>
@endsection