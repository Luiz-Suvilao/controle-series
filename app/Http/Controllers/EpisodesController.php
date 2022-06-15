<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\Interfaces\IEpisodeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EpisodesController extends Controller
{
    /**
     * @param Season $season
     * @return View
     */
    public function index(Season $season): View
    {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }

    /**
     * @param Request $request
     * @param Season $season
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Season $season): RedirectResponse
    {
        /** @var IEpisodeRepository $episodeRepository */
        $episodeRepository = resolve(IEpisodeRepository::class);
        $episodeRepository->watchEpisode($request, $season);

        return to_route('episodes.index', $season->id);
    }
}
