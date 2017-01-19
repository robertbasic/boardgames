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
        $since = new \DateTime('-1 month', new \DateTimeZone('Europe/Belgrade'));

        $boardgame = $this->model->getBoardgame($boardgameId);
        $averageScore = $this->model->getAverageScore($boardgameId, $since);
        $plays = $this->model->getPlays($boardgameId, $since);

        // Some made up formula
        $popularity = round(($plays['total_plays'] * $plays['avg_players']) / ($plays['total_plays'] * $averageScore * $plays['avg_players']) * 100, 2) - 10;

        return [
            'boardgame' => $boardgame,
            'score' => $averageScore,
            'plays' => $plays,
            'popularity' => $popularity
        ];
    }
}
