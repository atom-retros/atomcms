@props(['icon' => '', 'classes' => '', 'subHeader'])

<div class="w-full bg-[#21242e] p-3 rounded-lg flex gap-2 {{ $classes }}">
    @if (!empty($icon))
        {{ $icon }}
    @endif

   <div class="flex-col">
       <div class="text-lg font-bold text-gray-100 flex items-center">
           {{ $slot }}
       </div>

       @if(isset($subHeader))
           <p class="text-gray-500">{{ $subHeader }}</p>
       @endif
   </div>
</div>
