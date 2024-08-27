@extends('layouts.app')

@push('title', __('Staff'))

@section('content')
    <x-staff-application.composer :position="$position" :applied="$applied" />
    <x-staff-application.content :position="$position" />
@endsection