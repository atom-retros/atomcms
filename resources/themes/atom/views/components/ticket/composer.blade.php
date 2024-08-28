@props(['categories'])

<x-card.base title="{{ __('Create a ticket') }}" subtitle="{{ __('Please describe your request below') }}" icon="chat" icon-color="#375571">
    <x-form.form route="{{ route('help-center.tickets.store') }}" class="flex flex-col gap-3">
        <x-form.select
            id="category_id"
            :options="$categories"
            value="{{ old('category_id') }}"
        />

        <x-form.input
            id="title"
            type="text"
            label="{{ __('Title') }}"
            placeholder="{{ __('Enter a title for your ticket') }}"
            value="{{ old('title') }}"
            required
            autofocus
        />

        <x-form.textarea
            id="content"
            rows="3"
            label="{{ __('Content') }}"
            value="{{ old('content') }}"
        />

        <x-button type="submit" variant="secondary">{{ __('Submit ticket') }}</x-button>
    </x-form.form>
</x-card.base> 