@extends('layouts.app')

@push('title', __('Photos'))

@section('content')
    <div class="col-span-12">
        <x-photo.list :photos="$photos" />
    </div>
@endsection