@extends('layouts.app')

@push('title', __('Banned'))

@section('content')
    <div class="flex justify-center col-span-12 dark:text-gray-100">
        <div class="flex flex-col w-full max-w-3xl gap-3 mx-auto">
            <x-alert class="text-center">{{ __('It seems like you are banned off :hotel', ['hotel' => $settings->get('hotel_name')]) }}</x-alert>

            <x-card.base class="flex flex-col p-0">
                <div class="flex items-center border-b divide-x dark:border-gray-900 dark:text-white dark:divide-gray-900">
                    <p class="px-3 py-1 text-sm font-medium bg-gray-100 w-36 dark:bg-gray-900">{{ __('Ban type:') }}</p>
                    <p class="flex-1 px-3 py-1 text-sm">{{ $ban->type }}</p>
                </div>
                <div class="flex items-center border-b divide-x dark:border-gray-900 dark:text-white dark:divide-gray-900">
                    <p class="px-3 py-1 text-sm font-medium bg-gray-100 w-36 dark:bg-gray-900">{{ __('Ban reason:') }}</p>
                    <p class="flex-1 px-3 py-1 text-sm">{{ $ban->ban_reason }}</p>
                </div>
                <div class="flex items-center border-b divide-x dark:border-gray-900 dark:text-white dark:divide-gray-900">
                    <p class="px-3 py-1 text-sm font-medium bg-gray-100 w-36 dark:bg-gray-900">{{ __('Ban expiration:') }}</p>
                    <p class="flex-1 px-3 py-1 text-sm">{{ date('Y/m/d', $ban->ban_expire) }}</p>
                </div>
            </x-card.base>
        </div>
    </div>
@endsection