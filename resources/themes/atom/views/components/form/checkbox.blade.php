@props(['id' => '', 'label' => '', 'value' => '', 'required' => false])

<fieldset class="flex flex-wrap items-center w-full gap-3 text-sm leading-6">
    <input id="{{ $id }}" name="{{ $id }}" type="checkbox" class="w-4 h-4 text-blue-500 border-gray-300 rounded focus:ring-blue-600">

    <x-form.label id="{{ $id }}" :label="$label" />

    <x-form.error id="{{ $id }}" />
</fieldset>


{{-- @props(['id' => '', 'label' => '', 'info' => '', 'type' => 'text', 'placeholder' => '', 'value' => '', 'required' => false, 'readonly' => false, 'disabled' => false, 'autofocus' => false, 'labelClass' => ''])


<fieldset class="flex flex-col w-full gap-1">
    <x-form.label id="{{ $id }}" label="{{ $label }}" info="{{ $info }}" class="{{ $labelClass }}" />

    <div class="relative flex items-center">
        <input
            @class(['focus:ring-0 border-4 border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:border-[#eeb425] w-full', 'border-red-600 ring-red-500' => $errors->has($id)])
            type="{{ $type }}"
            name="{{ $id }}"
            id="{{ $id }}"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            @if ($required) required @endif
            @if ($disabled) disabled @endif
            @if ($readonly) readonly @endif
            @if ($autofocus) autofocus @endif
        />

        <div class="absolute right-3">
            {{ $slot }}
        </div>
    </div>

    <x-form.error id="{{ $id }}" />
</fieldset> --}}
