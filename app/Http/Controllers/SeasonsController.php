<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\View\View;

class SeasonsController extends Controller
{
    /**
     * @param Series $series
     * @return View
     */
    public function index(Series $series): View
    {
        $seasons = $series->seasons()->with('episodes')->get();

        return view('seasons.index')
            ->with('seasons', $seasons)
            ->with('series', $series);
    }
}
