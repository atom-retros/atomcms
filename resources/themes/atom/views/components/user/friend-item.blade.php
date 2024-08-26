@props(['friend'])

<div>
    <div class="w-10 h-10 bg-center bg-no-repeat border-2 border-gray-300 rounded-full image-rendering-pixelated dark:border-gray-900" style="background-image: url({{ $friend->friend->avatar }}&headonly=1&head_direction=3&gesture=sml)"></div>
</div>
