<?php

namespace App\Contracts;

use App\Models\Summoner;

interface SummonerRepositoryInterface
{
    public function findSummonnerByGameNameAndTag($gameName, $tagLine): ?Summoner;
}
