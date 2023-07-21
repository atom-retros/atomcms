<x-app-layout>
    @push('title', 'Create a ticket')

    <x-content.content-card icon="chat-icon" classes="border dark:border-gray-900 dark:text-gray-100 col-span-12 lg:col-span-9">
        <x-slot:title>
            {{ $ticket->title }} [{{ $ticket->category->name }}]
        </x-slot:title>

        <div class="w-full flex justify-end gap-x-3">
            <x-form.secondary-button>
                Close
            </x-form.secondary-button>

            <x-form.primary-button>
                Re-open
            </x-form.primary-button>

            <x-form.danger-button>
                Delete
            </x-form.danger-button>
        </div>

        <div class="flex flex-col gap-y-4 mt-4">
            <div class="w-full rounded bg-gray-200 dark:bg-gray-700">
                <div class="h-[50px] px-4 flex items-center justify-between border-b border-gray-300 dark:border-gray-800 relative overflow-hidden">
                    <div class="flex">
                        <small class="ml-14 text-gray-400">{{ $ticket->user->username }}</small>
                        <div class="absolute left-2 -bottom-10 flex gap-x-2">
                            <img src="{{ setting('avatar_imager') }}/{{ $ticket->user->look }}" alt="">
                        </div>
                    </div>

                    <small class="text-gray-400">2023-07-15 20:45:42</small>
                </div>

                <article class="prose-xl" style="width: 100%;">
                    {!! $ticket->content !!}
                </article>
            </div>

            <div class="w-full rounded bg-gray-200 dark:bg-gray-700">
                <div class="h-[50px] px-4 flex items-center justify-between border-b border-gray-300 dark:border-gray-800 relative overflow-hidden">
                    <small class="text-gray-400">2023-07-15 20:45:42</small>

                    <div class="flex">
                        <small class="mr-14 text-gray-400">Administrator</small>
                        <div class="absolute right-2 -bottom-10 flex gap-x-2">
                            <img class="scale-x-[-1]" src="{{ setting('avatar_imager') }}/{{ $ticket->user->look }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="p-4">
                    This is a reply
                </div>
            </div>
        </div>
    </x-content.content-card>

    <x-content.content-card icon="duo-chat-icon"
                            classes="border dark:border-gray-900 dark:text-gray-100 col-span-12 lg:col-span-3">
        <x-slot:title>
            {{ __('Open tickets') }}
        </x-slot:title>

        <x-slot:under-title>
            {{ __('Your current open tickets') }}
        </x-slot:under-title>


        <div class="flex flex-col gap-2">
            @forelse($openTickets as $ticket)
                <div class="w-full rounded bg-gray-200 p-2 dark:bg-gray-700">
                    <div class="flex items-center gap-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5"/>
                        </svg>

                        <a href="#" class="hover:text-[#eeb425]">
                            {{ $ticket->title }}
                        </a>
                    </div>
                </div>
            @empty
                <p>
                    You currently have no open tickets.
                </p>
            @endforelse
        </div>
    </x-content.content-card>
</x-app-layout>
