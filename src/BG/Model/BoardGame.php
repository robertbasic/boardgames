<?php

declare(strict_types=1);

namespace BG\Model;

class BoardGame
{
    protected $connection;

    protected $qb;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->qb = $connection->createQueryBuilder();
    }

    public function getBoardgame(int $boardgameId) : array
    {
        return $this->connection->fetchAssoc("SELECT * FROM boardgames WHERE id = ?", [$boardgameId]);
    }

    public function getBoardGamesInPrint() : array
    {
        return $this->connection->fetchAll("SELECT * FROM boardgames WHERE in_print = 1");
    }

    public function getAverageScore(int $boardgameId) : float
    {
        return (float) $this->connection->fetchColumn("SELECT AVG(score) FROM reviews WHERE boardgame_id = ?", [$boardgameId]);
    }

    public function getPlays(int $boardgameId, \DateTime $since) : array
    {
        return $this->connection->fetchAssoc("SELECT COUNT(*) AS total_plays, AVG(number_of_players) AS avg_players FROM plays WHERE boardgame_id = ? AND played_at >= ?", [$boardgameId, $since->format('Y-m-d H:i:s')]);
    }
}
