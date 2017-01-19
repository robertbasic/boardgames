<?php

declare(strict_types=1);

namespace BG\Service;

use BG\Model\BoardGame;

class InPrints
{
    protected $popularity;

    protected $model;

    public function __construct(Popularity $popularity, BoardGame $model)
    {
        $this->popularity = $popularity;
        $this->model = $model;
    }

    public function calculatePopularity()
    {
        $boardGamesInPrint = $this->model->getBoardGamesInPrint();

        foreach ($boardGamesInPrint as $key => $boardgame) {
            $popularity = $this->popularity->calculate((int) $boardgame['id']);
            $boardGamesInPrint[$key]['popularity'] = $popularity;
        }

        return $boardGamesInPrint;
    }
}
