<x-app-layout>
    @push('title', __('title.support_tickets.index'))

    <x-ticket.list :tickets="$tickets" />

    <a href="{{ route('help-center.tickets.create') }}" class="block w-full">
        <x-button.primary class="w-full">{{ __('buttons.create_support_ticket') }}</x-button.primary>
    </a>
</x-app-layout>
