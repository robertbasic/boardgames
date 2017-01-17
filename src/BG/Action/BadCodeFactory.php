<?php

declare(strict_types=1);

namespace BG\Action;

use Interop\Container\ContainerInterface;

class BadCodeFactory
{
    public function __invoke(ContainerInterface $container) : BadCode
    {
        $router = $container->get('router');
        $template = $container->get('template');

        return new BadCode($router, $template);
    }
}
