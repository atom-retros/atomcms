@props(['position'])

<div class="col-span-12 lg:col-span-4">
    <x-card.base title="{{ __('Applying for :position', ['position' => $position->permission->rank_name]) }}" subtitle="{{ __('Read before applying') }}" icon="hotel">
        <div class="max-w-full prose-sm prose dark:prose-invert">
            <p>{{ __('Please field out all the fields to apply for :position. Remember when applying for a position here at :hotel you must be fully transparent and honest. If found out the information provided is false or incorrect you might risk losing your position if hired.', ['position' => $position->permission->rank_name, 'hotel' => $settings->get('hotel_name')]) }}</p>
            <p>{!! $position->description !!}</p>
        </div>
    </x-card.base>
</div>
