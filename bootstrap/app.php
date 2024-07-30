<?php

use Atom\Core\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
            Atom\Installation\Http\Middleware\InstallationMiddleware::class,
            Atom\Locale\Http\Middleware\LocaleMiddleware::class,
            Atom\Theme\Http\Middleware\ThemeMiddleware::class,
            Atom\Core\Http\Middleware\BannedMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (HttpException $e, Request $request) {
            if (view()->exists(sprintf('%s.views.errors.%s', WebsiteSetting::firstWhere('key', 'theme')->value ?? 'atom', $e->getStatusCode()))) {
                return response()->view(sprintf('%s.views.errors.%s', WebsiteSetting::firstWhere('key', 'theme')->value ?? 'atom', $e->getStatusCode()), [], $e->getStatusCode());
            }
        });
    })->create();
