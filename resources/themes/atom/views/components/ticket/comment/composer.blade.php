@props(['ticket'])

<x-card.base title="{{ __('Comments') }}" subtitle="{{ __('Please submit your reply below') }}" icon="duo_chat" icon-color="#eec980">
    <x-form.form route="{{ route('help-center.tickets.replies.store', $ticket) }}" class="flex flex-col gap-3">
        <x-form.textarea id="content" placeholder="{{ __('Enter your reply here') }}" required />
        <x-button type="submit" variant="secondary">{{ __('Submit reply') }}</x-button>
    </x-form.form>
</x-card.base>