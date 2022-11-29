<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12">
        <div class="flex flex-col gap-y-4">
            @foreach($employees as $employee)
                <x-content.staff-content-section :badge="$employee->badge" :color="$employee->staff_color">
                    <x-slot:title>
                        {{ $employee->rank_name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $employee?->job_description }}
                    </x-slot:under-title>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach($employee->users as $staff)
                            <x-community.staff-card :user="$staff"/>
                        @endforeach
                    </div>

                    @if(count($employee->users) === 0)
                        <div class="text-center dark:text-gray-400">
                            {{ __('We currently have no staff in this position') }}
                        </div>
                    @endif
                </x-content.staff-content-section>
            @endforeach
        </div>
    </div>
</x-app-layout>
