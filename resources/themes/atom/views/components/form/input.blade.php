@props(['classes' => '', 'name', 'type' => 'text', 'value' => '', 'required' => true, 'autofocus' => false, 'readonly' => false])

<input
        class="{{ $classes }} focus:ring-0 border-4 border-gray-200 rounded focus:border-[#eeb425] w-full @error($name) border-red-600 ring-red-500 @enderror"
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ $value }}"
        required="{{ $required }}"
        autocomplete="{{ $name }}"
        @if($autofocus) autofocus="{{ $name }}" @endif
        @if($readonly) readonly @endif>

@error($name)
    <p class="mt-1 text-xs italic text-red-500">
        {{ $message }}
    </p>
@enderror