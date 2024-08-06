<x-app-layout>
    @push('title', __('title.support_tickets.show'))

    <x-ticket.content :ticket="$ticket" />

    {{-- @todo - Add comments --}}

    <x-ticket.delete :ticket="$ticket" />
</x-app-layout>
