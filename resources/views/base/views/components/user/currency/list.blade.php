@props(['currencies'])

<x-card class="bg-gray-100 dark:bg-gray-950 flex items-center justify-between divide-x dark:divide-gray-900">
    @foreach ($currencies as $currency)
        <x-user.currency.item :currency="$currency" />
    @endforeach
</x-card>
