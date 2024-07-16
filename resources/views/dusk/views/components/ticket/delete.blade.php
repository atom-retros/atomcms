@props(['ticket'])

<x-form.form action="{{ route('help-center.tickets.destroy', $ticket) }}">
    @method('DELETE')
    <x-button.primary class="ml-auto" type="submit">{{ __('buttons.delete_ticket') }}</x-button.primary>
</x-form.form>