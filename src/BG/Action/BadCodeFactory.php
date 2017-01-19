<?php

declare(strict_types=1);

namespace BG\Action;

use Interop\Container\ContainerInterface;
use BG\Service\InPrints;
use BG\Model\BoardGame;

class BadCodeFactory
{
    public function __invoke(ContainerInterface $container) : BadCode
    {
        $router = $container->get('router');
        $template = $container->get('template');

        $connection = $container->get(DB_CONNECTION);
        $model = new BoardGame($connection);
        $popularity = new \BG\Service\Popularity($model);

        $inPrints = new InPrints($popularity, $model);

        return new BadCode($router, $template, $inPrints);
    }
}
