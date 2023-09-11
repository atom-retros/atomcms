@props(['errorBag' => '', 'classes' => '', 'name', 'type' => 'text', 'value' => '', 'placeholder' => '', 'required' => true, 'autofocus' => false, 'readonly' => false])

<input
    class="{{ $classes }} focus:ring-0 border-2 border-gray-200 rounded bg-gray-100 focus:border-[#eeb425] w-full text-black @error($name, $errorBag) border-red-600 ring-red-500 @enderror"
    id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
    autocomplete="{{ $name }}" placeholder="{{ $placeholder }}" @if ($readonly) required @endif
    @if ($autofocus) autofocus="{{ $name }}" @endif
    @if ($readonly) readonly @endif>

@error($name, $errorBag)
    <p class="mt-1 text-xs italic text-red-500">
        {{ $message }}
    </p>
@enderror
