<?php

namespace App\Services;

use App\Contracts\RiotApiClientInterface;
use App\Contracts\SummonerRepositoryInterface;
use App\Models\Summoner;

class FetchSummonerService
{

    public function __construct(
        private RiotApiClientInterface      $riotApiClient,
        private SummonerRepositoryInterface $summonerRepository
    )
    {
    }

    public function handle(string $gameName, string $tagLine): ?Summoner
    {
        $summoner = $this->summonerRepository->findSummonnerByGameNameAndTag($gameName, $tagLine);

        if ($summoner) {
            return $summoner;
        }

        $puuid = $this->riotApiClient->getSummonerPuuid($gameName, $tagLine);
        $summonerData = $this->riotApiClient->getSummonerByPuuid($puuid);

        if ($summonerData) {
            // Save the summoner data to the repository
            // Uncomment the following line when the repository is implemented
            // $this->summonerRepository->save($summonerData);
            return $summonerData;
        }
        return null;
    }
}
