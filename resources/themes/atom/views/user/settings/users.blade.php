<x-app-layout>
    @push('title', __('Select user'))

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 flex flex-col gap-y-3 md:col-span-9">
        <x-content.content-card icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Select user') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Select on of your users below') }}
            </x-slot:under-title>

            <div class="grid grid-cols-6 gap-3">
                @foreach(Auth::user()->users()->where('id', '!=', Auth::user()->current_user_id)->get() as $user)
                    <form action="{{ route('settings.users-select', $user) }}" method="POST" class="flex flex-col gap-y-4">
                        @method('PUT')
                        @csrf

                        <button type="submit" class="border rounded p-4 flex justify-center hover:bg-gray-100 transition ease-in-out">
                            <img src="{{ setting('avatar_imager') }}/{{ $user->look }}" alt="">
                        </button>
                    </form>
                @endforeach
            </div>
        </x-content.content-card>
    </div>
</x-app-layout>
