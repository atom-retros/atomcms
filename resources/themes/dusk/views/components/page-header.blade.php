@props(['icon' => '', 'classes' => '', 'subHeader'])

<div class="w-full bg-[#21242e] p-3 rounded-lg flex gap-2 items-center {{ $classes }}">
    @if (!empty($icon))
        {{ $icon }}
    @endif

   <div class="flex-col px-2">
       <div class="text-lg font-bold text-gray-100 flex items-center">
           {{ $slot }}
       </div>

       @if(isset($subHeader))
           <p class="text-gray-500">{{ $subHeader }}</p>
       @endif
   </div>
</div>
