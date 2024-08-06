@props(['id' => '', 'label' => ''])

@if ($label)
    <label for="{{ $id }}" class="block text-sm leading-6 dark:text-white">{{ $label }}</label>
@endif