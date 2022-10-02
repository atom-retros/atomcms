<x-app-layout>
    @push('title', __('ROTW'))

    <div class="col-span-12 md:col-span-8">
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
                                <x-form.secondary-button classes="w-1/5">
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

                    <form action="{{ route('event.destroy.submission', 'rotw') }}" method="POST" style="display: flex; justify-content: flex-end;">
                        @method('DELETE')
                        @csrf

                        <x-form.danger-button classes="w-1/4 mt-4">
                            {{ __('Delete submission') }}
                        </x-form.danger-button>
                    </form>
                @endif
            </div>
        </x-content.content-section>
    </div>

    <div class="col-span-12 md:col-span-4">
        <x-content.content-section icon="hotel-icon">
            <x-slot:title>
                {{ __('What is ROTW') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('What exactly is ROTW?') }}
            </x-slot:under-title>

            <p class="dark:text-gray-100">
                {{ __('ROTW stands for for Room Of The Week. Every week players will be able to submit their room to ROTW, making them participate for great prizes! All you have to do to submit is to build a room matching the weeks ROTW theme and submit it right on this page, easy right? So what are you waiting for, get to building! (Keep in mind you can only submit 1 room per week)') }}
            </p>
        </x-content.content-section>
    </div>
</x-app-layout>

