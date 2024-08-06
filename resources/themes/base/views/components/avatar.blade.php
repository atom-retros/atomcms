@props(['username' => '', 'figure' => '', 'direction' => '', 'head_direction' => '', 'action' => '', 'gesture' => '', 'size' => 'm', 'headonly' => false])

<img {{ $attributes->merge(['class' => '']) }} src="{{ config('nitro.imager_url') }}?{{ http_build_query(compact('figure', 'direction', 'head_direction', 'action', 'gesture', 'size', 'headonly')) }}" alt="{{ $username }}" />
