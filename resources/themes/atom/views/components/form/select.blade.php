@props(['id' => '', 'label' => '', 'type' => 'text', 'placeholder' => '', 'value' => '', 'options' => [], 'required' => false])

<fieldset class="flex flex-col w-full gap-1">
    <x-form.label id="{{ $id }}" label="{{ $label }}" />

    <select
    @class(['focus:ring-0 border-4 border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:border-[#eeb425] w-full', 'border-red-600 ring-red-500' => $errors->has($id)])
        name="{{ $id }}"
        id="{{ $id }}"
        value="{{ $value }}"
        @if ($required) required @endif
    >
        <option disabled selected="{{ $value === null ? 'selected' : '' }}">Select an option</option>

        @foreach ($options as $option)
            <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
        @endforeach
    </select>
    <x-form.error id="{{ $id }}" />
</fieldset>
