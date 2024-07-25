<?php

return [
    // API key.
    // Get yours at https://www.tiny.cloud/auth/signup/
    'api_key' => env('TINYMCE_API_KEY', ''),

    // Plugins used by the editor.
    // See https://www.tiny.cloud/docs/tinymce/latest/plugins/ for a list of available plugins.
    'plugins' => [
        'accordion', 'fullscreen', 'autolink', 'lists', 'link', 'image', 'table', 'code', 'powerpaste', 'help',
        'wordcount', 'quickbars', 'advlist', 'image',
    ],

    // Configure toolbar buttons.
    // See https://www.tiny.cloud/docs/tinymce/latest/toolbar-configuration-options/.
    'toolbar' => [
        'undo redo restoredraft | h2 h3 h4 |
                 bold italic underline strikethrough blockquote removeformat |
                 align bullist numlist outdent indent | link anchor table | code fullscreen spoiler | image',
    ],

    // Additional editor properties, passed to the editors `init` prop.
    // See https://www.tiny.cloud/docs/tinymce/latest/initial-configuration/.
    'init' => [
        'menubar' => false,
        'branding' => false,
        'file_picker_types' => 'image',
        'image_caption' => true,
    ],

    // Storage disk to use for storing uploaded images.
    // Leave null to use the default nova storage disk.
    'storage_disk' => null,

    // Path to store uploaded images in.
    // Leave empty to use the root directory.
    'storage_path' => 'tinymce-images',

    // Maximum allowed image size in kilobytes.
    'storage_max' => 20000,

    // Relative path to the endpoint that handles image uploads.
    // Can replace with your own endpoint if you have specific needs.
    'storage_endpoint' => '/nova-vendor/jacobfitzp/nova-tinymce/upload',
];
