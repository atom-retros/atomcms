
@extends('layouts.app')

@push('title', __('Create a ticket'))

@section('content')
    <div class="col-span-12 lg:col-span-9">
        <x-ticket.composer :categories="$categories" />
    </div>

    <div class="col-span-12 lg:col-span-3">
        <x-ticket.list :tickets="$tickets" />
    </div>
@endsection