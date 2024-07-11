@props(['id' => '', 'label' => '', 'type' => 'text', 'placeholder' => '', 'value' => '', 'options' => [], 'required' => false])

<fieldset class="flex flex-col gap-1 w-full">
    <x-form.label id="{{ $id }}" label="{{ $label }}" />

    <select class="w-full h-auto text-sm px-3 py-2 rounded border-0 text-gray-900 shadow-none ring-2 outline-none focus:ring-blue-500" name="{{ $id }}" id="{{ $id }}" value="{{ $value }}" required="{{ $required }}">
        <option disabled selected="{{ $value === null ? 'selected' : '' }}">Select an option</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
        @endforeach
    </select>
    <x-form.error id="{{ $id }}" />
</fieldset>
