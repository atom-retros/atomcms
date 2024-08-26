@extends('layouts.app')

@push('title', __('Rules'))

@section('content')
    <div class="flex flex-col col-span-12 gap-y-3">
        <x-alert>{{ __('Rules and regulations are subject to change without notice. As a member of the :hotel community, you hereby agree to and understand the following terms and conditions above. Failure to comply with these rules and regulations will result in the necessary sanctions implemented upon your account. If you have any questions or concerns in regards to The :hotel Way, please do not hesitate to ask a member of the Hotel Staff.', ['hotel' => $settings->get('hotel_name')]) }}</x-alert>
        <x-rule.list :categories="$categories" />
    </div>
@endsection