<?php

return [
    'preloaders' => [
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
    ],
    
    'opcache' => [
        'enable' => true,
        'memory_consumption' => 128,
        'max_accelerated_files' => 4000,
        'revalidate_freq' => 60,
    ],
    
    'database' => [
        'connections' => [
            'sqlite' => [
                'options' => [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ],
            ],
        ],
    ],
];