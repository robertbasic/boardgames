<?php

declare(strict_types=1);

namespace BG\Service;

class Popularity
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function calculate(int $boardgameId) : array
    {
        $boardgame = $this->model->getBoardgame($boardgameId);
        $averageScore = $this->model->getAverageScore($boardgameId);
        $plays = $this->model->getPlays($boardgameId);

        return [
            'boardgame' => $boardgame,
            'score' => $averageScore,
            'plays' => $plays,
        ];
    }
}
