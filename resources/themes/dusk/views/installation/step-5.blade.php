<x-installation-layout>
    <x-content.installation-content-section icon="hotel-icon" classes="border">
        <x-slot:title>
            {{ __('Welcome to Atom CMS') }}
        </x-slot:title>

        <x-slot:under-title>
            {{ __('We are delighted of having you trying Atom CMS') }}
        </x-slot:under-title>

        <div class="space-y-3">
            <p>
                {{ __('Congratulations on successfully completing the Atom CMS setup! You have now taken the first steps towards an exciting new journey. With Atom CMS, you can effortlessly manage various aspect of your hotel, while giving your new visitors an easy gateway into a world of joy.') }}
            </p>

            <p>
                {{ __('You can at any time change the settings you went through. All it takes is for you to hop into your database and find the "website_settings" table and then tweak the settings you wish. Who knows... As you explore the features and functionalities of Atom CMS, you might discover features that will improve you and your users experience & helping you achieve your online goals!') }}
            </p>

            <p>
                {!! __('We also have written a throughout documentation, explaining tons of things regarding managing Atom CMS & other aspect of your hotel. You can visit our <a href=":documentation_link" target="_blank" class="font-semibold underline">comprehensive documentation right here</a>. Our goal is to keep expanding our coverage, so keep checking it from time to time.') !!}
            </p>

            <p>
                {{ __('Lastly, we just want to show our gratitude by letting your know how delighted we are to be a part of your journey and we hope you will gain some amazing memories. So, here is to your new hotel, the boundless creativity it will inspire, and the endless possibilities that lie ahead.') }}
            </p>

            <p class="font-semibold italic">
                {{ __('Once again, congratulations and best of wishes for you & your hotel!') }}
            </p>

            <form action="{{ route('installation.complete') }}" method="POST" class="w-full mt-3">
                @csrf

                <x-form.secondary-button>
                    {{ __('Take me to :hotel', ['hotel' => setting('hotel_name')]) }}
                </x-form.secondary-button>
            </form>
        </div>



        <div class="flex gap-x-4">
            <form action="{{ route('installation.previous-step') }}" method="POST" class="w-full mt-3">
                @csrf

                <x-form.primary-button>
                    {{ __('Previous step') }}
                </x-form.primary-button>
            </form>

            <form action="{{ route('installation.restart') }}" method="POST" class="w-full mt-3">
                @csrf

                <x-form.danger-button>
                    {{ __('Restart installation') }}
                </x-form.danger-button>
            </form>
        </div>
    </x-content.installation-content-section>

    <script>
        localStorage.setItem("theme", 'light');
    </script>

    @if (setting('cms_color_mode') === 'dark')
        <script>
            localStorage.removeItem("theme");

            if (localStorage.getItem("theme") === null) {
                document.documentElement.classList.add("dark");
                localStorage.setItem("theme", 'dark');
            }
        </script>
    @endif
</x-installation-layout>
