<?php

declare(strict_types=1);

use BG\DatabaseConnectionFactory;

return [
    'dependencies' => [
        'services' => [
        ],
        'invokables' => [
        ],
        'factories' => [
            DB_CONNECTION => DatabaseConnectionFactory::class,
        ]
    ]
];
