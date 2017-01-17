<?php

declare(strict_types=1);

namespace BG\Action;

use Interop\Container\ContainerInterface;
use BG\Model\BoardGame;

class PopularityFactory
{
    public function __invoke(ContainerInterface $container) : Popularity
    {
        $router = $container->get('router');
        $template = $container->get('template');

        $connection = $container->get(DB_CONNECTION);
        $model = new BoardGame($connection);
        $service = new \BG\Service\Popularity($model);

        return new Popularity($router, $template, $service);
    }
}
