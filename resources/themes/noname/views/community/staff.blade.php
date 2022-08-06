<x-app-layout>
    <div class="col-span-12">
        <div class="flex flex-col gap-y-4">
            @foreach($employees as $employee)
                <h2 class="font-bold text-xl border-b">
                    {{ $employee->rank_name }}
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                    @foreach($employee->users as $staff)
                        <x-community.staff-card :user="$staff"/>
                    @endforeach
                </div>

                @if(count($employee->users) === 0)
                    <span class="font-bold text-center">We currently have no staff in this position</span>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>