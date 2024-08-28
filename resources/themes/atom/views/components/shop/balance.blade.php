<x-card.base title="{{ __('Top up account') }}" subtitle="{{ __('Donate to :hotel', ['hotel' => $settings->get('hotel_name')]) }}" icon="currency" icon-color="#e3ad06">
    <x-form.form route="{{ route('shop.top-up') }}" class="flex flex-col gap-3">
        <p class="px-4 py-2 text-sm text-center text-black bg-gray-100 rounded dark:text-gray-100 dark:bg-gray-700">
            {{ __('Current balance: $:balance', ['balance' => auth()->user()->website_balance]) }}
        </p>

        <x-form.input
            id="amount"
            type="number"
            placeholder="{{ __('Amount') }}"
            min="5"
            step="5"
            required
        />

        <x-button type="submit" variant="secondary">{{ __('Donate') }}</x-button>
    </x-form.form>
</x-card.base>