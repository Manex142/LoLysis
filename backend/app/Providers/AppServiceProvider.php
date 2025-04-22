<?php

namespace App\Providers;

use App\Contracts\RiotApiClientInterface;
use App\Contracts\SummonerRepositoryInterface;
use App\Infrastructure\Api\FakeRiotApiClient;
use App\Infrastructure\Api\RiotApiClient;
use App\Infrastructure\Repositories\FakeSummonerRepository;
use App\Services\FetchSummonerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SummonerRepositoryInterface::class, function ($app) {
            return new FakeSummonerRepository(); // O pasar dependencias si las necesita
        });
        $this->app->bind(RiotApiClientInterface::class, FakeRiotApiClient::class);
    }
}
