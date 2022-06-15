<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use App\Repositories\Interfaces\IEpisodeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodeRepository implements IEpisodeRepository
{
    /**
     * @param Request $request
     * @param Season $season
     * @return void
     */
    public function watchEpisode(Request $request, Season $season): void
    {
        DB::beginTransaction();
        $watchedEpisodesId = $request->episodes;

        $season->episodes->each(function (Episode $episode) use ($watchedEpisodesId) {
            $episode->watched = in_array($episode->id, $watchedEpisodesId);
        });

        $season->push();
        DB::commit();
    }
}
