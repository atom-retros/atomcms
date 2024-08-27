@extends('layouts.app')

@push('title', $user->username)

@section('content')
    <div class="col-span-12">
        <div class="grid grid-cols-1 gap-14">
            <div class="grid grid-cols-3 gap-8">
                <x-profile.hero :user="$user" />
                <x-profile.currency.list :user="$user" />
            </div>

            <div class="hidden grid-cols-2 gap-x-14 md:grid">
                <x-profile.badge.list :user="$user" />
                <x-profile.group.list :user="$user" />
            </div>

            <div class="hidden grid-cols-2 gap-x-14 md:grid">
                <x-profile.room.list :user="$user" />
                <x-profile.friend.list :user="$user" />
            </div>
        </div>
    </div>
@endsection