<?php

namespace App\Models;

use JsonSerializable;

class Summoner implements JsonSerializable
{
    public function __construct(
        private string $puuid,
        private string $gameName,
        private string $tagLine,
        private string $accountId,
        private int $profileIconId,
        private int $revisionDate,
        private int $summonerLevel,
        private string $id
    ) {
    }

    public function getPuuid(): string
    {
        return $this->puuid;
    }

    public function getGameName(): string
    {
        return $this->gameName;
    }

    public function getTagLine(): string
    {
        return $this->tagLine;
    }

    // Implementación de JsonSerializable
    public function jsonSerialize(): array
    {
        return [
            'puuid' => $this->puuid,
            'gameName' => $this->gameName,
            'tagLine' => $this->tagLine,
            'accountId' => $this->accountId,
            'profileIconId' => $this->profileIconId,
            'revisionDate' => $this->revisionDate,
            'summonerLevel' => $this->summonerLevel,
            'id' => $this->id,
        ];
    }
}
