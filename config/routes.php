<?php

declare(strict_types=1);

use BG\Action\HomePage;
use BG\Action\HomePageFactory;
use Zend\Expressive\Router\FastRouteRouter;
use BG\Action\BadCodeFactory;
use BG\Action\BadCode;
use BG\Action\PopularityFactory;
use BG\Action\Popularity;

return [
    'dependencies' => [
        'services' => [
            'router' => new FastRouteRouter()
        ],
        'invokables' => [
        ],
        'factories' => [
            HomePage::class => HomePageFactory::class,
            BadCode::class => BadCodeFactory::class,
            Popularity::class => PopularityFactory::class,
        ]
    ]
];
