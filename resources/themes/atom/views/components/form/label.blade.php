@props(['id' => '', 'label' => '', 'info' => ''])

@if ($label || $info)
    <div class="flex flex-col gap-1">
        @if ($label)
            <label for="{{ $id }}" {{ $attributes->merge(['class' => 'block font-semibold text-gray-700 dark:text-gray-200']) }}>{!! $label !!}</label>
        @endif

        @if ($info)
            <p class="text-gray-500 dark:text-gray-400 text-[14px]">{{ $info }}</p>
        @endif
    </div>
@endif
