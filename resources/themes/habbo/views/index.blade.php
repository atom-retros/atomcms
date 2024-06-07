<x-app-layout>
    @push('title', __('Welcome to the best hotel on the web!'))

    <section>
        <div class="grid xl:grid-cols-4 justify-center gap-4">
            <div class="col-span-3">
                <h1 class="font-semibold text-3xl uppercase pb-4">{{ __('Latest news') }}</h1>
                <div class="grid grid-cols-2 gap-4">
                    @if(isset($articles) && count($articles) > 0)
                        @for($i = 0; $i < count($articles); $i++)
                            @if($i === 0)
                                <div class="col-span-2">
                                    <x-app.article.big :article="$articles[$i]" />
                                </div>
                            @else
                                <div class="col-span-2 lg:col-span-1">
                                    <x-app.article.small :article="$articles[$i]" />
                                </div>
                            @endif
                        @endfor
                    @endif
                </div>
            </div>
            <div class="col-span-3 xl:col-span-1">
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-[var(--blue-light)] rounded">
                        <div class="bg-[var(--blue-dark)] text-center rounded-t p-2">
                            <h1 class="text-xl uppercase">{{ __('Safety Tips') }}</h1>
                        </div>
                        <div class="text-[#7ecaee] grid gap-y-2 py-4 xl:py-2 px-4">
                            <p>
                                {{ __('Protect yourself consciously!') }} <a class="text-white hover:underline" href="#">{{ __('Learn how to stay safe on the Internet.') }}</a>.
                            </p>
                        </div>
                    </div>
                    <div class="bg-[var(--blue-light)] rounded">
                        <div class="bg-[var(--blue-dark)] text-center rounded-t p-2">
                            <h1 class="text-xl uppercase">
                                {{ __('Plan International') }}
                            </h1>
                        </div>
                        <div class="text-[#7ecaee] grid gap-y-2 py-4 xl:py-2 px-4">
                            <p>
                                {{ __('Help through') }} <span class="font-semibold">{{ __('Plan International') }}</span> {{ __('children all over the world with just a few euros.') }}

                            </p>
                            <p>
                                {{ __('Use') }} <a class="text-white hover:underline" href="https://www.plan.de/jetzt-spenden.html" target="_blank">{{ __('this link') }}</a> {{ __('to learn more and make a donation.') }}
                            </p>
                            <p class="text-sm text-[var(--blue-dark)]">
                                {{ setting('hotel_name') }} {{ __('is not in partnership or benefits from a donation.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
