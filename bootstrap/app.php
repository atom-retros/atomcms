<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Sentry\Laravel\Integration;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi();

        $middleware->throttleApi();

        $middleware->preventRequestsDuringMaintenance(except: [
            'auth*',
            'beta-codes*',
        ]);

        $middleware->validateCsrfTokens(except: [
            'auth*',
            'beta-codes*',
        ]);

        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            Atom\Installation\Http\Middleware\InstallationMiddleware::class,
            Atom\Locale\Http\Middleware\LocaleMiddleware::class,
            Atom\Theme\Http\Middleware\ThemeMiddleware::class,
            Atom\Core\Http\Middleware\BannedMiddleware::class,
            Atom\Core\Http\Middleware\VPNMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        Integration::handles($exceptions);
    })->create();
