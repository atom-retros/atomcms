<div id="modal" class="z-[999] fixed top-0 left-0 h-full w-full bg-black/75">
    <div class="h-full w-full flex justify-center items-center p-2">
        <div class="max-h-[calc(100vh_-_15px)] max-w-[600px] w-full bg-[var(--blue-light)] border-2 border-[var(--blue-dark)] p-4 overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>