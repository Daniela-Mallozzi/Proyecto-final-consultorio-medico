<?php

declare(strict_types=1);

namespace Flasher\Laravel\Resources;

return [
    'default' => 'flasher',

    'main_script' => env('APP_URL') . '/vendor/flasher/flasher.min.js',

    'styles' => [
        env('APP_URL') . '/vendor/flasher/toastr.min.css',
    ],

    'translate' => true,

    'inject_assets' => true,

    'flash_bag' => [
        'success' => ['success'],
        'error' => ['error', 'danger'],
        'warning' => ['warning', 'alarm'],
        'info' => ['info', 'notice', 'alert'],
    ],

    'filter' => [
        'limit' => 5,
    ],
    
    'plugins' => [
        'toastr' => [
            'scripts' => [
                env('APP_URL') . '/vendor/flasher/jquery.min.js',
                env('APP_URL') . '/vendor/flasher/toastr.min.js',
                env('APP_URL') . '/vendor/flasher/flasher-toastr.min.js',
            ],
            'styles' => [
                env('APP_URL') . '/vendor/flasher/toastr.min.css',
            ],
            'options' => [
                'closeButton' => true
            ],
        ],
    ],
];