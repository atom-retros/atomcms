<x-app-layout>
    @push('title', 'Create a ticket')

    <x-content.content-card icon="chat-icon" classes="border dark:border-gray-900 dark:text-gray-100 col-span-12 lg:col-span-9">
        <x-slot:title>
            {{ $ticket->title }} [{{ $ticket->category->name }}]
        </x-slot:title>

        <div class="w-full flex gap-x-3">
            @if($ticket->isOpen())
                <form action="{{ route('help-center.ticket.toggle-status', $ticket) }}" method="POST" class="w-full">
                    @method('PUT')
                    @csrf

                    <x-form.secondary-button>
                        Close
                    </x-form.secondary-button>
                </form>
            @else
                <form action="{{ route('help-center.ticket.toggle-status', $ticket) }}" method="POST" class="w-full">
                    @method('PUT')
                    @csrf

                    <x-form.primary-button>
                        Re-open
                    </x-form.primary-button>
                </form>
            @endif

            <form action="{{ route('help-center.ticket.destroy', $ticket) }}" method="POST" class="w-full">
                @method('DELETE')
                @csrf

                <x-form.danger-button>
                    Delete
                </x-form.danger-button>
            </form>
        </div>

        <article class="prose-xl mt-8" style="width: 100%;">
            {!! $ticket->content !!}
        </article>
    </x-content.content-card>

   <div class="col-span-12 lg:col-span-3">
       <x-content.content-card icon="duo-chat-icon"
                               classes="border dark:border-gray-900 dark:text-gray-100">
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
   </div>

    <x-content.content-card icon="duo-chat-icon"
                            classes="border dark:border-gray-900 dark:text-gray-100 border dark:border-gray-900 dark:text-gray-100 col-span-12 lg:col-span-9 -mt-4">
        <x-slot:title>
            {{ __('Comments') }}
        </x-slot:title>

        <x-slot:under-title>
            {{ __('Please submit your reply below') }}
        </x-slot:under-title>

        @if($ticket->isOpen())
            <form action="{{ route('help-center.ticket.reply.store', $ticket) }}" method="POST">
                @csrf

                <x-form.wysiwyg-editor />

                <x-form.secondary-button classes="mt-2">
                    {{ __('Submit reply') }}
                </x-form.secondary-button>
            </form>
        @endif

        <div class="flex flex-col gap-y-4 mt-4">
            @forelse($ticket->replies->sortByDesc('created_at') as $reply)
                @if($reply->user_id === auth()->user()->id)
                    <div class="w-full rounded bg-gray-200 dark:bg-gray-700">
                        <div class="h-[50px] px-4 flex items-center justify-between border-b border-gray-300 dark:border-gray-800 relative overflow-hidden">
                            <div class="flex">
                                <small class="ml-14 text-gray-400">{{ $reply->user->username }}</small>
                                <div class="absolute left-2 -bottom-10 flex gap-x-2">
                                    <img src="{{ setting('avatar_imager') }}/{{ $reply->user->look }}" alt="">
                                </div>
                            </div>

                            <div class="flex gap-x-2">
                                <small class="text-gray-400">{{ $reply->created_at->diffForHumans() }}</small>

                                @if($reply->user_id === Auth::id() || hasPermission('delete_website_ticket_replies'))
                                    <form action="{{ route('help-center.ticket.reply.destroy', $reply) }}" method="POST">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <div class="p-4">
                            {!! $reply->content !!}
                        </div>
                    </div>
                @else
                    <div class="w-full rounded bg-gray-200 dark:bg-gray-700">
                        <div class="h-[50px] px-4 flex items-center justify-between border-b border-gray-300 dark:border-gray-800 relative overflow-hidden">
                            <div class="flex gap-x-2">
                                <form action="{{ route('help-center.ticket.reply.destroy', $reply) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

                                <small class="text-gray-400">{{ $reply->created_at->diffForHumans() }}</small>
                            </div>


                            <div class="flex">
                                <small class="mr-14 text-gray-400">{{ $reply->user->username }}</small>
                                <div class="absolute right-2 -bottom-10 flex gap-x-2">
                                    <img class="scale-x-[-1]" src="{{ setting('avatar_imager') }}/{{ $reply->user->look }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            {!! $reply->content !!}
                        </div>
                    </div>
                @endif
            @empty
                <p>
                    {{ __('There is currently no replies') }}
                </p>
            @endforelse
        </div>
    </x-content.content-card>
</x-app-layout>
