<?php

return [
    /**
     * Socket URL
     */
    'socket_url' => env('NITRO_SOCKET_URL', 'ws://localhost:'.env('NITRO_SOCKET_PORT', 2096)),

    /**
     * Socket Port
     */
    'socket_port' => env('NITRO_SOCKET_PORT', 2096),

    /**
     * Base URL
     */
    'base_url' => env('NITRO_BASE_URL', config('app.url')),

    /**
     * Camera URL
     */
    'camera_url' => env('NITRO_CAMERA_URL', config('app.url')),

    /**
     * Imager URL
     */
    'imager_url' => env('NITRO_IMAGER_URL', config('app.url')),

    /**
     * Thumbnail Path
     */
    'thumbnail_path' => env('NITRO_THUMBNAIL_PATH', '/thumbnail'),

    /**
     * SWF Path
     */
    'swf_path' => env('NITRO_SWF_PATH', '/nitro-swf'),

    /**
     * Asset Path
     */
    'asset_path' => env('NITRO_ASSET_PATH', '/nitro-assets'),

    /**
     * Image Path
     */
    'image_path' => env('NITRO_IMAGE_PATH', '/images'),

    /**
     * Gordon Path
     */
    'gordon_path' => env('NITRO_GORDON_PATH', '/gordon'),

    /**
     * Production Path
     */
    'production_path' => env('NITRO_PRODUCTION_PATH', '/PRODUCTION'),

    /**
     * Gamedata Path
     */
    'gamedata_path' => env('NITRO_GAMEDATA_PATH', '/gamedata'),

    /**
     * Gamedata Path
     */
    'asset_gamedata_path' => env('NITRO_ASSET_GAMEDATA_PATH', '/gamedata'),

    /**
     * DCR Path
     */
    'dcr_path' => env('NITRO_DCR_PATH', '/dcr'),

    /**
     * HOF Furni Path
     */
    'hof_furni_path' => env('NITRO_HOF_FURNI_PATH', '/hof_furni'),

    /**
     * C Images Path
     */
    'c_images_path' => env('NITRO_C_IMAGES_PATH', '/c_images'),

    /**
     * Sounds Path
     */
    'sounds_path' => env('NITRO_SOUNDS_PATH', '/sounds'),

    /**
     * MP3 Path
     */
    'mp3_path' => env('NITRO_MP3_PATH', '/mp3'),

    /**
     * Bundled Path
     */
    'bundle_path' => env('NITRO_BUNDLE_PATH', '/bundled'),

    /**
     * Figure Path
     */
    'figure_path' => env('NITRO_FIGURE_PATH', '/figure'),

    /**
     * Effect Path
     */
    'effect_path' => env('NITRO_EFFECT_PATH', '/effect'),

    /**
     * Furniture Path
     */
    'furniture_path' => env('NITRO_FURNITURE_PATH', '/furniture'),

    /**
     * Icons Path
     */
    'icons_path' => env('NITRO_ICONS_PATH', '/icons'),

    /**
     * Pet Path
     */
    'pet_path' => env('NITRO_PET_PATH', '/pet'),

    /**
     * Generic Path
     */
    'generic_path' => env('NITRO_GENERIC_PATH', '/generic'),

    /**
     * Badge Path
     */
    'badge_path' => env('NITRO_BADGE_PATH', '/album1584'),

    /**
     * Notifications Path
     */
    'notification_path' => env('NITRO_NOTIFICATION_PATH', '/notifications'),

    /**
     * Catalogue Path
     */
    'catalogue_path' => env('NITRO_CATALOGUE_PATH', '/catalogue'),

    /**
     * Quests Path
     */
    'achievements_path' => env('NITRO_ACHIEVEMENTS_PATH', '/Quests'),

    /**
     * Currency Icon Path
     */
    'currency_icon_path' => env('NITRO_CURRENCY_ICON_PATH', '/wallet'),
];
