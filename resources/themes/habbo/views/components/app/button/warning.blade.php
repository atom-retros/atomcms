@props(['onclick' => null, 'x_onclick' => null, 'submit' => false, 'href' => '#'])

@if($submit === true)
    <button 
        class="inline-block text-black text-center uppercase bg-[var(--btn-warning)] hover:bg-[var(--btn-warning-hover)] active:bg-[var(--btn-warning-active)] border-2 border-[var(--btn-warning-border)] hover:border-[var(--btn-warning-border-hover)] active:border-[var(--btn-warning-active-border)] shadow-[0_3px_0_1px_rgba(0,0,0,.3)] active:shadow-[0_1px_0_1px_rgba(0,0,0,.3)] transform active:translate-y-[2px] rounded px-4 py-2" 
        type="submit"
        @if($onclick !== null)
            onclick="{{ $onclick }}" 
        @elseif($x_onclick !== null)
            x-on:click="{{ $x_onclick }}"
        @endif
    >
        {{ $slot }}
    </button>
@else
    <a 
        class="inline-block text-black text-center uppercase bg-[var(--btn-warning)] hover:bg-[var(--btn-warning-hover)] active:bg-[var(--btn-warning-active)] border-2 border-[var(--btn-warning-border)] hover:border-[var(--btn-warning-border-hover)] active:border-[var(--btn-warning-active-border)] shadow-[0_3px_0_1px_rgba(0,0,0,.3)] active:shadow-[0_1px_0_1px_rgba(0,0,0,.3)] transform active:translate-y-[2px] rounded px-4 py-2" 
        href="{{ $href }}"
        @if($onclick !== null)
            onclick="{{ $onclick }}" 
        @elseif($x_onclick !== null)
            x-on:click="{{ $x_onclick }}"
        @endif
    >
        {{ $slot }}
    </a>
@endif