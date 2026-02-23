<?php

declare(strict_types=1);

spl_autoload_register(static function ($fqcn): void {
    $path = sprintf('%s.php', str_replace(['Src\\Domain', '\\'], ['src', '/'], $fqcn));
    require_once $path;
});

use Src\Domain\MatchMaker\Encounter\Score;
use Src\Domain\MatchMaker\Lobby;
use Src\Domain\MatchMaker\Player\Player;

$greg = new Player('greg');
$chuckNorris = new Player('Chuck Norris', 3000);

$lobby = new Lobby();
$lobby->addPlayer($greg);
$lobby->addPlayer($chuckNorris);

while (count($lobby->queuingPlayers)) {
    $lobby->createEncounters();
}

$encounter = end($lobby->encounters);

// ces scores sont fictifs !
$encounter->setScores(
    new Score(score: 42, player: $greg),
    new Score(score: 1, player: $chuckNorris)
);

var_dump($encounter);

$encounter->updateRatios();

var_dump($greg);
var_dump($chuckNorris);
