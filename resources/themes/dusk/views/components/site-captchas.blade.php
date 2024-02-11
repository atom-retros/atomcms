@props(['placement' => 'left', 'classes' => ''])

<div
    @class([
        'w-full flex mt-3',
        'justify-start' => $placement === 'left',
        'justify-center' => $placement === 'center',
        'justify-end' => $placement === 'right',
    ])
    class="{{ $classes }}"
>
    @if (setting('google_recaptcha_enabled'))
        <div class="mt-4 g-recaptcha"
             data-sitekey="{{ config('habbo.site.recaptcha_site_key') }}"></div>
    @endif

    @if (setting('cloudflare_turnstile_enabled') === '1')
        <x-turnstile-widget
            language="en-US"
            size="normal"
            callback="callbackFunction"
            errorCallback="errorCallbackFunction"
        />
    @endif
</div>
