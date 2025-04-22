<?php

namespace App\Contracts;

use App\Models\Summoner;

interface RiotApiClientInterface
{
    public function getSummonerPuuid($gameName, $tagLine): ?string;

    public function getSummonerByPuuid($puuid): ?Summoner;

    public function getSummonerFullNameByPuuid($puuid): ?string;
}
