@props(['id' => '', 'label' => '', 'type' => 'text', 'placeholder' => '', 'value' => '', 'required' => false])

<fieldset class="flex flex-col gap-1 w-full">
    <x-form.label id="{{ $id }}" label="{{ $label }}" />
    <textarea class="w-full h-auto text-sm px-3 py-2 rounded border-0 text-gray-900 shadow-none ring-2 outline-none focus:ring-blue-500" type="{{ $type }}" name="{{ $id }}" id="{{ $id }}" placeholder="{{ $placeholder }}" value="{{ $value }}" required="{{ $required }}"></textarea>
    <x-form.error id="{{ $id }}" />
</fieldset>
