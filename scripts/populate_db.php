<?php

use Doctrine\DBAL\DriverManager;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$config = require 'config/config.php';

$connectionParams = $config['db'];

$connection = DriverManager::getConnection($connectionParams);

$faker = Faker\Factory::create();

for ($i = 1; $i <= 1000; $i++) {
    $boardgame = [
        'name' => $faker->domainWord,
        'in_print' => $faker->boolean(66),
    ];
    $connection->insert('boardgames', $boardgame);
}

for ($i = 1; $i <= 100000; $i++) {
    $play = [
        'boardgame_id' => $faker->numberBetween(1, 1000),
        'number_of_players' => $faker->numberBetween(2, 8),
        'played_at' => $faker->dateTimeBetween('-3 months', 'now', 'Europe/Belgrade')->format('Y-m-d H:i:s')
    ];
    $connection->insert('plays', $play);
}

for ($i = 1; $i <= 500000; $i++) {
    $review = [
        'boardgame_id' => $faker->numberBetween(1, 1000),
        'score' => $faker->numberBetween(1, 10)
    ];
    $connection->insert('reviews', $review);
}
