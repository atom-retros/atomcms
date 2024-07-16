<?php

return [
    'base.url' => config('nitro.swf_path'),
    'flash.client.url' => config('nitro.production_path'),
    'furnidata.load.url' => sprintf('%s/furnidata.xml', config('nitro.gamedata_path')),
    'productdata.load.url' => sprintf('%s/productdata.txt', config('nitro.gamedata_path')),
    'figuredata.load.url' => env('NITRO_FIGUREDATA_URL', 'https://www.habbo.com/gamedata/figuredata/1'),
    'figuremap.load.url' => sprintf('%s/figuremap.xml', config('nitro.gamedata_path')),
    'effectmap.load.url' => sprintf('%s/effectmap.xml', config('nitro.gamedata_path')),
    'dynamic.download.pet.url' => sprintf('%s/%s.swf', config('nitro.production_path'), '%className%'),
    'dynamic.download.figure.url' => sprintf('%s/%s.swf', config('nitro.production_path'), '%className%'),
    'dynamic.download.effect.url' => sprintf('%s/%s.swf', config('nitro.production_path'), '%className%'),
    'flash.dynamic.download.url' => config('nitro.hof_furni_path'),
    'dynamic.download.furniture.url' => sprintf('%s/%s.swf', config('nitro.hof_furni_path'), '%className%'),
    'external.variables.url' => sprintf('%s/external_variables.txt', config('nitro.gamedata_path')),
    'external.texts.url' => sprintf('%s/external_flash_texts.txt', config('nitro.gamedata_path')),
    'convert.figure' => env('NITRO_CONVERT_FIGURE', '1'),
    'convert.effect' => env('NITRO_CONVERT_EFFECT', '1'),
    'convert.furniture' => env('NITRO_CONVERT_FURNITURE', '1'),
    'convert.furniture.floor.only' => env('NITRO_CONVERT_FURNITURE_FLOOR_ONLY', '0'),
    'convert.furniture.wall.only' => env('NITRO_CONVERT_FURNITURE_WALL_ONLY', '0'),
    'convert.pet' => env('NITRO_CONVERT_PET', '1'),
];
