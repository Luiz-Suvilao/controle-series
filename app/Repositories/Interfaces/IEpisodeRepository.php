<?php

namespace App\Repositories\Interfaces;

use App\Models\Season;
use Illuminate\Http\Request;

interface IEpisodeRepository
{
    public function watchEpisode(Request $request, Season $season): void;
}
