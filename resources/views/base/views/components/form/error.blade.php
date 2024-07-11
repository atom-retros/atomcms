@props(['id' => ''])

@if ($errors->has($id))
    <p class="text-xs text-red-600" id="{{ $id }}-error">{{ $errors->first($id) }}</p>
@endif
