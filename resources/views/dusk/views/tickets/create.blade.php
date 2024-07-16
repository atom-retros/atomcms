<x-app-layout>
    @push('title', __('title.support_tickets.create'))

    <x-ticket.composer :categories="$categories" />
</x-app-layout>
