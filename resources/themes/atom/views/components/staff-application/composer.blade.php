@props(['position', 'applied'])

<div class="col-span-12 lg:col-span-8">
    <x-card.base title="{{ __('You are applying for :position', ['position' => $position->permission->rank_name]) }}" subtitle="{{ __('Please fill out the fields below to apply for :position', ['position' => $position->permission->rank_name]) }}" badge="{{ $position->permission->badge }}">
        @if (!$applied)
            <x-form.form route="{{ route('community.staff-applications.store') }}" class="flex flex-col gap-3">
                <input type="hidden" name="position_id" value="{{ $position->id }}" />
                <input type="hidden" name="rank_id" value="{{ $position->permission->id }}" />

                <x-form.input
                    id="username"
                    label="{{ __('Username') }}"
                    value="{{ auth()->user()->username }}"
                    readonly
                />

                <x-form.textarea
                    id="content"
                    label="{{ __('About you') }}"
                    rows="3"
                />

                <x-button type="submit">
                    {{ __('Apply for :position', ['position' => $position->permission->rank_name]) }}
                </x-button>
            </x-form.form>
        @endif
    </x-card.base>
</div>