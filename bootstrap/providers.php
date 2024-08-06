<?php

return [
    // Local Providers
    App\Providers\AppServiceProvider::class,
    App\Providers\NovaServiceProvider::class,

    // Atom Providers
    Atom\Installation\InstallationServiceProvider::class,
    Atom\Rcon\RconServiceProvider::class,
    Atom\Voting\VotingServiceProvider::class,
    Atom\Locale\LocaleServiceProvider::class,
    Atom\Theme\ThemeServiceProvider::class,
    Atom\Core\CoreServiceProvider::class,

    // Third Party Providers
];
