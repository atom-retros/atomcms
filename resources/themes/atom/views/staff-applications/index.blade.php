@extends('layouts.app')

@push('title', __('Staff'))

@section('content')
    <div class="col-span-12 lg:col-span-9">
        <x-staff-application.list :positions="$positions" />
    </div>

    <div class="flex flex-col col-span-12 gap-3 lg:col-span-3">
        <x-card.base title="{{ __('Apply for :hotel staff', ['hotel' => $settings->get('hotel_name')]) }}" subtitle=" {{ __('Select position to get started', ['hotel' => $settings->get('hotel_name')]) }}" icon="chat" icon-color="#375571">
            <div class="prose-sm prose dark:prose-invert">
                <p>{{ __('Here at :hotel we open up for staff applications every now and then. Sometimes you will find this page empty other times it might be filled with positions, if you ever come across a position you feel you would fit perfectly into, then do not hesitate to apply for it.', ['hotel' => $settings->get('hotel_name')]) }}</p>
            </div>
        </x-card.base>
    </div>
@endsection