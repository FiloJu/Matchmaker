<?php

declare(strict_types=1);

namespace Src\Domain\MatchMaker\Encounter;

use Src\Domain\MatchMaker\Player\PlayerInterface;

class Score
{
    public function __construct(public PlayerInterface $player, public int $score)
    {
    }
}
