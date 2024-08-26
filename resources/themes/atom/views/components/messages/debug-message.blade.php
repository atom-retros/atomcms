@if (config('app.debug') || config('app.env') === 'local')
    <p class="block px-4 py-2 text-xs font-medium text-white bg-red-500">
        It seems like debug mode is enabled. It is heavily recommended to set APP_DEBUG in the .env file to false in production mode
    </p>
@endif
