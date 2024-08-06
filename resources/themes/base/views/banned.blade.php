<x-app-layout>
    @push('title', __('title.banned'))

    <x-card class="p-3 !bg-red-600 text-xs text-white">
        {!! __('ban.message', ['name' => $settings->get('hotel_name'), 'reason' => $ban->ban_reason, 'url' => route('help-center.tickets.create')]) !!}
    </x-card>
</x-app-layout>
