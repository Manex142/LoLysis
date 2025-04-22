<?php

namespace Tests;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function summonerFromApi(): void
    {
        $this->get('summoner/FakeName10/FakeTag10');

        $this->seeStatusCode(200);

        $this->seeJsonEquals([
            'puuid' => '10',
            'gameName' => 'FakeName10',
            'tagLine' => 'FakeTag10',
            'accountId' => 'FakeAccountId10',
            'profileIconId' => 10,
            'revisionDate' => 10,
            'summonerLevel' => 10,
            'id' => 'FakeId10',
        ]);
    }

    /**
     * @test
     */
    public function summonerFromRepo(): void
    {
        $this->get('summoner/FakeName0/FakeTag0');

        $this->seeStatusCode(200);

        $this->seeJsonEquals([
            'puuid' => '0',
            'gameName' => 'FakeName0',
            'tagLine' => 'FakeTag0',
            'accountId' => 'FakeAccountId0',
            'profileIconId' => 0,
            'revisionDate' => 0,
            'summonerLevel' => 0,
            'id' => 'FakeId0',
        ]);
    }
}
