<?php

namespace App\Http\Controllers;

use App\Services\FetchSummonerService;
use Laravel\Lumen\Routing\Controller as BaseController;

class SummonerController extends BaseController
{
    protected $fetchSummonerService;

    public function __construct(FetchSummonerService $fetchSummonerService)
    {
        $this->fetchSummonerService = $fetchSummonerService;
    }

    public function show($gameName, $tagLine)
    {
        $summoner = $this->fetchSummonerService->handle($gameName, $tagLine);
        return response()->json($summoner);
    }
}
