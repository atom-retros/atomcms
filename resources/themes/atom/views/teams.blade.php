@extends('layouts.app')

@push('title', __('Welcome to the best hotel on the web!'))

@section('content')
    <div class="col-span-12">
        <div class="flex flex-col gap-3">
            <x-team.list :teams="$teams" />
        </div>
    </div>
@endsection