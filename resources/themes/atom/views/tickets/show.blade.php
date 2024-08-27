
@extends('layouts.app')

@push('title', $ticket->title)

@section('content')
    <div class="flex flex-col col-span-12 gap-3 lg:col-span-9">
        <x-ticket.details :ticket="$ticket" />
        <x-ticket.comment.composer :ticket="$ticket" />
        <x-ticket.comment.list :ticket="$ticket" />

    </div>

    <div class="col-span-12 lg:col-span-3">
        <x-ticket.list :tickets="$tickets" />
    </div>
@endsection