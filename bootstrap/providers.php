<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\NovaServiceProvider::class,
    App\Providers\VoltServiceProvider::class,
    Atom\Core\CoreServiceProvider::class,
    Atom\Installation\InstallationServiceProvider::class,
    Atom\Locale\LocaleServiceProvider::class,
    Atom\Rcon\RconServiceProvider::class,
    Atom\Theme\ThemeServiceProvider::class,
    Atom\Voting\VotingServiceProvider::class,
];
