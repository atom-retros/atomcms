@extends('layouts.app')

@push('title', auth()->user()->username)

@section('content')
    <div class="flex flex-col col-span-12 gap-3 md:col-span-9">
        <x-user.hero />
        
        <x-user.friends :friends="$friends" />

        <x-user.referrals :referrals="$referrals" />
    </div>
    
    <div class="flex flex-col col-span-12 gap-3 md:col-span-3">
        @if ($articles->count())
            <x-article.item :article="$article" />
        @endif

        @if ($settings->get('discord_widget_id'))
            <x-user.discord />
        @endif
    </div>
@endsection