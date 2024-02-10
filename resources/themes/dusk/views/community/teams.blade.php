<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12">
        <div class="flex flex-col gap-y-4">
            @foreach ($employees as $employee)
                <x-page-header sub-header="{{ $employee->job_description }}">
                    <x-slot:icon>
                        <img src="{{ setting('badges_path') }}/{{ $employee->badge }}" alt="" onerror="this.onerror=null;this.src='{{ asset('/assets/images/dusk/ADM.gif') }}';">
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
</x-app-layout>
