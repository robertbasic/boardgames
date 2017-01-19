<?php

declare(strict_types=1);

namespace BG\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use BG\Service\InPrints;

class BadCode
{
    private $router;

    private $template;

    private $inPrints;

    public function __construct(RouterInterface $router, TemplateRendererInterface $template, InPrints $inPrints)
    {
        $this->router = $router;
        $this->template = $template;
        $this->inPrints = $inPrints;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next) : HtmlResponse
    {
        $boardgames = $this->inPrints->calculatePopularity();

        $variables = [
            'boardgames' => $boardgames
        ];

        $template = $this->template->render('boardgame::bad-code', $variables);

        return new HtmlResponse($template);
    }
}
