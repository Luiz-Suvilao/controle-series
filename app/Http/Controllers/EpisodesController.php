<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EpisodesController extends Controller
{
    public function index(Season $season): View
    {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }
}
