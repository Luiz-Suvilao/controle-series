<?php

namespace App\Providers;

use App\Repositories\EpisodeRepository;
use App\Repositories\Interfaces\IEpisodeRepository;
use Illuminate\Support\ServiceProvider;

class EpisodeRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IEpisodeRepository::class, EpisodeRepository::class);
    }
}
