<x-app-layout>
    @push('title', __('ROTW'))

    <div class="col-span-12 md:col-span-8 space-y-3">
        <x-content.content-section icon="hotel-icon">
            <x-slot:title>
                {{ __('Room Of The Week') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Participate in ROTW and win great prizes!') }}
            </x-slot:under-title>

            <div>
                @if(!auth()->user()->rotwEntry()->exists())
                    <form method="POST" action="{{ route('event.store', 'rotw') }}">
                        @csrf

                        <table class="w-full dark:text-gray-100">
                            <tr class="font-semibold">
                                <td>{{ __('Room') }}</td>
                                <td>{{ __('Room description') }}</td>
                                <td>{{ __('Room ID') }}</td>
                            </tr>

                            @foreach($rooms AS $room)
                                <tr class="text-sm">
                                    <td class="flex gap-x-2 items-center">
                                        <img src="{{ asset(sprintf('assets/images/rooms/room_icon_%s.gif', $room->state)) }}"
                                             alt="{{ $room->state }}" title="{{ $room->state }}"/>

                                        {{ $room->name }}
                                    </td>

                                    <td>
                                        {{ strlen($room->description) > 0 ? $room->description : 'No description' }}
                                    </td>

                                    <td>
                                        {{ $room->id }}
                                    </td>

                                    <td>
                                        <input type="radio" name="room_id" value="{{ $room->id }}" required/>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        @if(count($rooms) > 0)
                            <div class="w-full flex justify-end mt-4">
                                <x-form.secondary-button classes="md:w-1/5">
                                    {{ __('Submit room') }}
                                </x-form.secondary-button>
                            </div>
                        @endif

                    </form>
                @else
                    <table class="w-full dark:text-gray-100">
                        <tr class="text-sm">
                            <td>
                                {{ __('Room name') }}
                            </td>

                            <td>
                                {{ __('Room description') }}
                            </td>

                            <td>
                                {{ __('Room ID') }}
                            </td>
                        </tr>

                        <tr class="text-sm">
                            <td class="flex gap-x-2 items-center">
                                <img src="{{ asset(sprintf('assets/images/rooms/room_icon_%s.gif', auth()->user()->rotwEntry->room->state)) }}"
                                     alt="{{ auth()->user()->rotwEntry->room->state }}" title="{{ auth()->user()->rotwEntry->room->state }}"/>

                                <strong>[{{ __('Submitted') }}]</strong> {{ auth()->user()->rotwEntry->room->name }}
                            </td>

                            <td>
                                {{ auth()->user()->rotwEntry->room->description }}
                            </td>

                            <td>
                                {{ auth()->user()->rotwEntry->room_id }}
                            </td>
                        </tr>
                    </table>
                    <div class="bg-red-600 text-white py-2 text-center rounded my-2">
                        {{ __('It seems you have already entered this weeks ROTW') }}
                    </div>

                    <form action="{{ route('event.destroy.submission', auth()->user()->rotwEntry) }}" method="POST" style="display: flex; justify-content: flex-end;">
                        @method('DELETE')
                        @csrf

                        <x-form.danger-button classes="md:w-1/4 mt-4">
                            {{ __('Delete submission') }}
                        </x-form.danger-button>
                    </form>
                @endif
            </div>
        </x-content.content-section>

        @if(permission('min_rank_to_submit_event_winners'))
            <x-content.content-section icon="hotel-icon">
                <x-slot:title>
                    {{ __('Submit winners') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Submit the weekly ROTW winners') }}
                </x-slot:under-title>

                <table class="w-full dark:text-gray-100">
                    <tr class="font-semibold">
                        <td>{{ __('Room') }}</td>
                        <td>{{ __('Owner') }}</td>
                        <td>{{ __('Room description') }}</td>
                        <td>{{ __('Room ID') }}</td>
                    </tr>

                    @foreach($entries AS $entry)
                        <tr>
                            <td class="flex gap-x-2 items-center">
                                <img src="{{ asset(sprintf('assets/images/rooms/room_icon_%s.gif', $entry->room->state ?? 'open')) }}"
                                     alt="{{ $entry->room->state ?? 'open' }}" title="{{ $entry->room->state ?? 'open' }}"/>

                                {{ $entry->room->name ?? 'Unknown name' }}
                            </td>

                            <td>
                                {{ $entry->room->user->username ?? 'Unknown user' }}
                            </td>

                            <td>
                                {{ strlen($entry->room->description) > 0 ? $entry->room->description : 'No description' }}
                            </td>

                            <td>
                                {{ $entry->room_id  ?? 'Unknown ID' }}
                            </td>
                        </tr>
                    @endforeach
                </table>

                <form class="mt-4" method="POST" action="{{ route('event.submit-winners', 'rotw') }}">
                    @csrf

                   <div class="flex flex-col md:flex-row gap-2 w-full">
                           <x-form.input classes="md:w-3/4" name="winners" value="{{ old('winners') }}" placeholder="{{ __('Enter the winners (room id from first to last) seperated by commas') }}" :autofocus="true" />

                           <x-form.secondary-button classes="md:w-1/4">
                               {{ __('Submit winners') }}
                           </x-form.secondary-button>
                   </div>
                </form>
            </x-content.content-section>
        @endif

        <div class="flex gap-x-3">
            @if(permission('min_rank_to_delete_event_submissions'))
                <x-content.content-section icon="hotel-icon">
                    <x-slot:title>
                        {{ __('Reset Winners') }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ __('Reset last week winners') }}
                    </x-slot:under-title>

                    <div class="dark:text-gray-100">
                        <p>{{ __('Press the Reset winners button to reset last week winners.') }}</p>

                        <form method="POST" action="{{ route('event.winners.destroy', 'rotw') }}"
                              style="display: flex; justify-content: center; margin-top: 0.5rem;">
                            @method('DELETE')
                            @csrf

                            <x-form.danger-button>
                                {{ __('Reset winners') }}
                            </x-form.danger-button>
                        </form>
                    </div>
                </x-content.content-section>
            @endif

            @if(permission('min_rank_to_delete_event_submissions'))
                <x-content.content-section icon="hotel-icon">
                    <x-slot:title>
                        {{ __('Delete submissions') }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ __('Delete all submissions') }}
                    </x-slot:under-title>

                    <div class="dark:text-gray-100">
                        <p>{{ __('Press the Delete submissions button to delete all submissions.') }}</p>

                        <form method="POST" action="{{ route('event.submissions.destroy', 'rotw') }}"
                              style="display: flex; justify-content: center; margin-top: 0.5rem;">
                            @method('DELETE')
                            @csrf

                            <x-form.danger-button>
                                {{ __('Delete submissions') }}
                            </x-form.danger-button>
                        </form>
                    </div>
                </x-content.content-section>
            @endif
        </div>
    </div>

    <div class="col-span-12 md:col-span-4 space-y-3">
        <x-content.content-section icon="hotel-icon">
            <x-slot:title>
                {{ __('What is ROTW') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('What exactly is ROTW?') }}
            </x-slot:under-title>

            <p class="dark:text-gray-100 mb-3">
                {{ __('ROTW stands for for Room Of The Week. Every week players will be able to submit their room to ROTW, making them participate for great prizes! All you have to do to submit is to build a room matching the weeks ROTW theme and submit it right on this page - Easy right! (Keep in mine you can only submit 1 room per week)') }}
            </p>
        </x-content.content-section>

        <x-content.content-section icon="hotel-icon">
            <x-slot:title>
                {{ __('Current Winners') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Current ROTW winners') }}
            </x-slot:under-title>

            <div class="dark:text-gray-100">
                @forelse($currentWinners AS $key => $winner)
                    <div class="flex gap-x-2 items-center">
                        <img src="{{ asset(sprintf('assets/images/rooms/%s.gif', $key + 1)) }}"/>
                        {{ $winner->user->username ?? 'Unknown' }} :
                        <b>{{ $winner->entry->room->name ?? 'Unknown' }}</b>
                    </div>
                @empty
                    <div class="alert alert-primary text-center">
                        {{ __('There is currently no ROTW winners') }}
                    </div>
                @endforelse
            </div>
        </x-content.content-section>
    </div>
</x-app-layout>

