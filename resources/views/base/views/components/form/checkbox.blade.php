@props(['id' => '', 'label' => '', 'value' => '', 'required' => false])

<fieldset class="flex items-center flex-wrap gap-3 w-full text-sm leading-6">
    <input id="{{ $id }}" name="{{ $id }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-500 focus:ring-blue-600">
    <label for="{{ $id }}" class="font-medium text-gray-900 dark:text-white">{{ $label }}</label>

    @if ($errors->has($id))
        <div class="w-full">
            <x-form.error id="{{ $id }}" />
        </div>
    @endif
</fieldset>