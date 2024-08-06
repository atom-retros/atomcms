@props(['id' => '', 'label' => '', 'type' => 'text', 'placeholder' => '', 'value' => '', 'options' => [], 'required' => false])

<fieldset class="flex flex-col w-full gap-1">
    <x-form.label id="{{ $id }}" label="{{ $label }}" />

    <select class="w-full h-auto px-3 py-2 text-sm text-gray-900 border-0 rounded shadow-none outline-none ring-2 focus:ring-blue-500" name="{{ $id }}" id="{{ $id }}" value="{{ $value }}" required="{{ $required }}">
        <option disabled selected="{{ $value === null ? 'selected' : '' }}">Select an option</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
        @endforeach
    </select>
    <x-form.error id="{{ $id }}" />
</fieldset>
