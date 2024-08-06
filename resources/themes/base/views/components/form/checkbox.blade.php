@props(['id' => '', 'label' => '', 'value' => '', 'required' => false])

<fieldset class="flex flex-wrap items-center w-full gap-3 text-sm leading-6">
    <input id="{{ $id }}" name="{{ $id }}" type="checkbox" class="w-4 h-4 text-blue-500 border-gray-300 rounded focus:ring-blue-600">
    <label for="{{ $id }}" class="font-medium text-gray-900 dark:text-white">{{ $label }}</label>

    @if ($errors->has($id))
        <div class="w-full">
            <x-form.error id="{{ $id }}" />
        </div>
    @endif
</fieldset>