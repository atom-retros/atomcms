<x-card.base title="{{ __('Voucher') }}" subtitle="{{ __('Use a voucher for free credit') }}" icon="catalog" icon-color="rgba(141, 74, 183, .51)">
    <x-form.form route="{{ route('shop.voucher.redeem') }}" class="flex flex-col gap-3">
        <x-form.input
            id="code"
            placeholder="{{ __('Voucher ')}}"
            autofocus
        />
        <x-button type="submit" variant="secondary">{{ __('Use voucher') }}</x-button>
    </x-form.form>
</x-card.base>