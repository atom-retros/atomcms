@props(['id' => '', 'label' => '', 'type' => 'text', 'placeholder' => '', 'value' => '', 'required' => false, 'disabled' => false, 'readonly' => false, 'autofocus' => false])

<fieldset class="flex flex-col w-full gap-1">
    <x-form.label id="{{ $id }}" label="{{ $label }}" />

    <textarea
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
    ></textarea>

    <x-form.error id="{{ $id }}" />
</fieldset>
