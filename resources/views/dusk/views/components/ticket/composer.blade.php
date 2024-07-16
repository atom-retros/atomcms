@props(['categories'])

<x-form.form action="{{ route('help-center.tickets.store') }}" class="flex flex-col gap-6">
    <x-form.select id="category_id" label="{{ __('form.category') }}" value="{{ old('category_id') }}" :options="$categories" required />
    <x-form.input id="title" label="{{ __('form.title') }}" value="{{ old('title') }}" required />
    <x-form.textarea id="content" label="{{ __('form.content') }}" value="{{ old('content') }}" required />
    <x-button.primary type="submit">{{ __('buttons.create_ticket') }}</x-button.primary>
</x-form.form>