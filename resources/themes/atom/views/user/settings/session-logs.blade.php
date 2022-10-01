<x-app-layout>
    @push('title', __('Session logs'))

    <div class="col-span-12 md:col-span-3 flex flex-col gap-y-3">
        <x-user.settings.settings-navigation />
    </div>

    <div class="col-span-12 md:col-span-9 flex flex-col gap-y-3">
        <div class="rounded bg-white shadow p-4 dark:bg-gray-900">
            <div class="overflow-hidden overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="whitespace-nowrap dark:text-white px-4 py-2 text-left font-medium text-gray-900">
                                IP
                            </th>
                            <th class="whitespace-nowrap dark:text-white px-4 py-2 text-left font-medium text-gray-900">
                                Browser
                            </th>
                            <th class="whitespace-nowrap dark:text-white px-4 py-2 text-left font-medium text-gray-900">
                                Date
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($logs as $log)
                        <tr>
                            <td class="whitespace-nowrap dark:text-gray-300 px-4 py-2 font-medium text-gray-900">
                                {{ $log->ip }}
                            </td>
                            <td class="px-4 py-2 dark:text-gray-300 text-gray-700">{{ $log->browser }}</td>
                            <td class="whitespace-nowrap dark:text-gray-300 px-4 py-2 text-gray-700">{{ $log->created_at->format(config('habbo.site.date_format')) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="whitespace-nowrap text-center dark:text-gray-300 px-4 py-2 text-gray-700" colspan="3">
                                {{ __('No session logs found') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</x-app-layout>
