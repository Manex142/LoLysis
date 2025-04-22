<?php

namespace App\Infrastructure\Api;

use App\Contracts\RiotApiClientInterface;
use App\Models\Summoner;

class FakeRiotApiClient implements RiotApiClientInterface
{
    private array $fakeSummoners;

    public function __construct()
    {
        $this->fakeSummoners = [
            '10' => new Summoner(
                '10',
                'FakeName10',
                'FakeTag10',
                'FakeAccountId10',
                10,
                10,
                10,
                'FakeId10'
            ),
            '11' => new Summoner(
                '11',
                'FakeName11',
                'FakeTag11',
                'FakeAccountId11',
                11,
                11,
                11,
                'FakeId11'
            ),
        ];
    }

    public function getSummonerPuuid($gameName, $tagLine): ?string
    {
        foreach ($this->fakeSummoners as $summoner) {
            if ($summoner->getGameName() === $gameName && $summoner->getTagLine() === $tagLine) {

                return $summoner->getPuuid();
            }
        }

        return null;
    }

    public function getSummonerByPuuid($puuid): ?Summoner
    {
        return $this->fakeSummoners[$puuid] ?? null;
    }

    public function getSummonerFullNameByPuuid($puuid): ?string
    {
        $summoner = $this->fakeSummoners[$puuid] ?? null;

        return $summoner ? $summoner->getGameName() . '#' . $summoner->getTagLine() : null;
    }
}
