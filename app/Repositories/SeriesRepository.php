<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\Interfaces\ISeriesRepository;
use Illuminate\Support\Facades\DB;

class SeriesRepository implements ISeriesRepository
{
    /**
     * @param SeriesFormRequest $request
     * @return Series
     */
    public function add(SeriesFormRequest $request): Series
    {
        DB::beginTransaction();
        /** @var Series $serie */
        $serie = Series::create($request->all());
        $seasons = [];

        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season) {
            for ($j = 1; $j <= $request->episodesQty; $j++)  {
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);

        DB::commit();

        return $serie;
    }
}
