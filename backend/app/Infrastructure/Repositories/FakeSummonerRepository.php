<?php

namespace App\Infrastructure\Repositories;

use App\Contracts\SummonerRepositoryInterface;
use App\Models\Summoner;

class FakeSummonerRepository implements SummonerRepositoryInterface
{
    private array $fakeSummoners = [];

    public function __construct()
    {
        for ($i = 0; $i < 10; $i++) {
            $summoner = new Summoner(
                (string) $i,
                'FakeName' . $i,
                'FakeTag' . $i,
                'FakeAccountId' . $i,
                $i,
                $i,
                $i,
                'FakeId' . $i
            );

            $key = $this->buildKey($summoner->getGameName(), $summoner->getTagLine());
            $this->fakeSummoners[$key] = $summoner;
        }
    }

    public function findSummonnerByGameNameAndTag($gameName, $tagLine): ?Summoner
    {
        return $this->fakeSummoners[$this->buildKey($gameName, $tagLine)] ?? null;
    }

    private function buildKey(string $gameName, string $tagLine): string
    {
        return $gameName . '#' . $tagLine;
    }
}
