<?php

namespace App\Services;

use Illuminate\Foundation\Vite;

class ViteService extends Vite
{
    /**
     * Generate a script tag for the given URL.
     */
    protected function makeScriptTag($url): string
    {
        return sprintf('<script type="module" src="%s" data-turbolinks-eval="false"></script>', $url);
    }
}
