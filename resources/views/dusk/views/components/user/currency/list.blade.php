@props(['user', 'currencies'])

<x-card class="flex items-center justify-between bg-gray-100 divide-x dark:bg-gray-950 dark:divide-gray-900">
    <x-user.currency.item :currency="(object) ['user_id' => $user->id, 'type' => -1, 'amount' => $user->credits]" />

    @foreach ($currencies as $currency)
        <x-user.currency.item :currency="$currency" />
    @endforeach
</x-card>
