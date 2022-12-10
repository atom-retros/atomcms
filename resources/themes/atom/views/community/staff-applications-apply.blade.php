<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <x-content.staff-content-section :badge="$position->permission->badge" :color="$position->permission->staff_color">
            <x-slot:title>
                {{ __('You are applying for :position', ['position' => $position->permission->rank_name]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Please fill out the fields below to apply for :position', ['position' => $position->permission->rank_name]) }}
            </x-slot:under-title>

            <form class="flex flex-col gap-y-3" action="{{ route('staff-applications.store', $position) }}" method="POST">
                @csrf

                <div>
                    <x-form.label for="username" disabled>
                        Username
                    </x-form.label>

                    <x-form.input classes="bg-red-200" name="username" value="{{ auth()->user()->username }}" :readonly="true" />
                </div>

                <div>
                    <x-form.label for="username" disabled>
                        About you
                    </x-form.label>

                    <textarea name="content" class="focus:ring-0 border-4 border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:border-[#eeb425] w-full min-h-[180px]"></textarea>
                </div>

                @if(setting('google_recaptcha_enabled'))
                    <div class="g-recaptcha" data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
                @endif

                <x-form.primary-button>
                    {{ __('Apply for :position', ['position' => $position->permission->rank_name]) }}
                </x-form.primary-button>
            </form>
        </x-content.staff-content-section>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Applying for :position', ['position' => $position->permission->rank_name]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Read before applying') }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-4">
                <p>
                    {{ __('Please field out all the fields to apply for :position. Remember when applying for a position here at :hotel you must be fully transparent and honest. If found out the information provided is false or incorrect you might risk losing your position if hired.', ['position' => $position->permission->rank_name, 'hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-section>
    </div>
</x-app-layout>
