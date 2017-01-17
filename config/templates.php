<?php

declare(strict_types=1);

use Zend\Expressive\ZendView\ZendViewRendererFactory;

return [
    'dependencies' => [
        'factories' => [
            'template' => ZendViewRendererFactory::class,
            Zend\View\HelperPluginManager::class => Zend\Expressive\ZendView\HelperPluginManagerFactory::class,
        ],
    ],
    'templates' => [
        'layout' => 'layout/boardgame',
        'map' => [
            'layout/boardgame' => 'templates/layout/boardgame.phtml'
        ],
        'paths' => [
            'boardgame' => ['templates/boardgame'],
            'layout' => ['templates/layout'],
            'error' => ['templates/error'],
        ]
    ],
    'view_helpers' => [
        'invokables' => [
            //'flashMessages' => 'BG\Application\View\FlashMessages'
        ]
    ]
];
