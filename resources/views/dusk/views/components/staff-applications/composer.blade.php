@props(['position'])

@if (!auth()->user()->staffApplications->firstWhere('rank_id', $position->permission->id))
    <x-card class="bg-gray-100 p-3 dark:bg-gray-950">
        <x-form.form action="{{ route('community.staff-applications.store') }}" class="flex flex-col gap-6">
            <x-form.input type="hidden" id="position_id" value="{{ $position->id }}" />
            <x-form.input type="hidden" id="rank_id" value="{{ $position->permission->id }}" />
            <x-form.textarea id="content" label="{{ __('form.staff_applications.content') }}" value="{{ old('content') }}" />
            <x-button.primary type="submit">{{ __('buttons.staff_applications.send') }}</x-button.primary>
        </x-form.form>
    </x-card>
@else
    <x-card class="p-3 !bg-green-500 !text-white">
        <p class="text-sm">{{ __('staff_applications.already_applied') }}</p>
    </x-card>
@endif