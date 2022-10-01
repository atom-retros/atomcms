<?php

namespace App\Services;

use Illuminate\Foundation\Vite;

class ViteService extends Vite
{
    /**
     * Generate a script tag for the given URL.
     *
     * @param  string  $url
     * @return string
     */
    protected function makeScriptTag($url)
    {
        return sprintf('<script type="module" src="%s" data-turbolinks-eval="false"></script>', $url);
    }
}
