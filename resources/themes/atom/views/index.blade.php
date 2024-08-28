@extends('layouts.app')

@push('title', __('Welcome to the best hotel on the web!'))

@section('content')
    <div class="col-span-12">
        <div class="flex flex-col gap-12">
            <x-card.base title="{{ __('Latest news') }}" subtitle="{{ __('Keep up to date with the latest hotel gossip.') }}" icon="hotel" guest>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <x-article.list :articles="$articles" />
                </div>
            </x-card.base>

            <x-photo.list :photos="$photos" guest />
        </div>
    </div>
@endsection