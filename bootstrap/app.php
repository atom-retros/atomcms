<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

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

        $middleware->web(append: [
            Atom\Installation\Http\Middleware\InstallationMiddleware::class,
            Atom\Locale\Http\Middleware\LocaleMiddleware::class,
            Atom\Theme\Http\Middleware\ThemeMiddleware::class,
            Atom\Core\Http\Middleware\BannedMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
