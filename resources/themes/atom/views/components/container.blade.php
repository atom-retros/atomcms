<div class="overflow-hidden">
    <div @class(['grid grid-cols-12 p-6 mx-auto mt-10 max-w-7xl gap-x-3 gap-y-8 md:mt-0', $attributes->get('class')])>
        {{ $slot }}
    </div>
</div>