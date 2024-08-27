@props(['user'])

<div class="grid w-full grid-cols-1 col-span-3 gap-3 mt-4 md:gap-0 md:overflow-hidden md:rounded-lg md:space-y-0 md:col-span-2 md:mt-0 md:grid-cols-3">
    <x-profile.currency.item amount="{{ $user->credits }}" icon="credits" class="bg-[#f8ef2b] text-[#b16d18]" />
    <x-profile.currency.item amount="{{ $user->currencies->firstWhere('type', 0)?->amount ?? 0 }}" icon="duckets" class="bg-[#e99bdc] text-[#812378]" />
    <x-profile.currency.item amount="{{ $user->currencies->firstWhere('type', 5)?->amount ?? 0 }}" icon="diamonds" class="bg-[#82d6db] text-[#146867]" />
</div>
