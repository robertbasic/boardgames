<?php

declare(strict_types=1);

namespace BG\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use BG\Service\Popularity as Service;

class Popularity
{
    private $router;

    private $template;

    private $service;

    public function __construct(RouterInterface $router, TemplateRendererInterface $template, Service $service)
    {
        $this->router = $router;
        $this->template = $template;
        $this->service = $service;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next) : HtmlResponse
    {
        $faker = \Faker\Factory::create();
        $boardgameId = $faker->numberBetween(1, 1000);

        $popularity = $this->service->calculate($boardgameId);

        $variables = [
            'popularity' => $popularity
        ];

        $template = $this->template->render('boardgame::popularity', $variables);

        return new HtmlResponse($template);
    }
}
