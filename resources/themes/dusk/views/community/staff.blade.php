<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9">
        @foreach ($employees as $employee)
            <x-page-header sub-header="{{ $employee->job_description }}">
                <x-slot:icon>
                    <img src="{{ setting('badges_path') }}/{{ $employee->badge }}.gif" alt="" onerror="this.onerror=null;this.src='{{ asset('/assets/images/dusk/ADM.gif') }}';">
                </x-slot:icon>

                {{ $employee->rank_name }}
            </x-page-header>

            @if (count($employee->users) > 0)
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 mt-4 mb-5">
                    @foreach ($employee->users as $staff)
                        <x-community.staff-card :user="$staff" />
                    @endforeach
                </div>
            @else
                <div class="bg-gray-700/40 w-full py-3 flex items-center justify-center rounded-lg text-gray-500 mt-4 mb-6">
                    {{ __('We currently have no staff in this position') }}
                </div>
            @endif
        @endforeach
    </div>


    <div class="col-span-12 lg:col-span-3 space-y-6">
        <x-content.content-card icon="chat-icon">
            <x-slot:title>
                {{ __(':hotel staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('About the :hotel staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm space-y-4 dark:text-gray-200">
                <p>
                    {{ __('The :hotel staff team is one big happy family, each staff member has a different role and duties to fulfill.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {{ __('Most of our team usually consists of players that have been around :hotel for quite a while, but this does not mean we only recruit old & known players, we recruit those who shine out to us!', ['hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-card>

        <x-content.content-card icon="chat-icon">
            <x-slot:title>
                {{ __('Apply for staff') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('How to join the staff team', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm space-y-4 dark:text-gray-200">
                <p>
                    {{ __('Every now and then staff applications may open up. Once they do we always make sure to post a news article explaining the process - So make sure you keep an eye out for those in you are interested in joining the :hotel staff team.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {!! __(
                        'You can occasionally also look at the :startTag Staff application page :endTag which will show you all of our current open positions.',
                        ['startTag' => '<a href="/community/staff-applications" class="underline">', 'endTag' => '</a>'],
                    ) !!}
                </p>
            </div>
        </x-content.content-card>
    </div>
</x-app-layout>
