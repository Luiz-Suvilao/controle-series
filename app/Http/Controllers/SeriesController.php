<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\Interfaces\ISeriesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SeriesController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $series = Series::with(['seasons'])->get();
        $messageSuccess = session('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('messageSuccess', $messageSuccess);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('series.create');
    }

    /**
     * @param SeriesFormRequest $request
     * @return RedirectResponse
     */
    public function store(SeriesFormRequest $request): RedirectResponse
    {
        /** @var ISeriesRepository $serieRepository */
        $serieRepository = resolve(ISeriesRepository::class);
        $serie = $serieRepository->add($request);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->name}' criada com sucesso.");
    }

    /**
     * @param Series $series
     * @return RedirectResponse
     */
    public function destroy(Series $series): RedirectResponse
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso.");
    }

    /**
     * @param Series $series
     * @return View
     */
    public function edit(Series $series): View
    {
        $seasons = $series->seasons()->with('episodes')->get();
        return view('series.edit')
            ->with('seasons', $seasons)
            ->with('series', $series);
    }

    /**
     * @param Series $series
     * @param SeriesFormRequest $request
     * @return RedirectResponse
     */
    public function update(Series $series, SeriesFormRequest $request): RedirectResponse
    {
        $series->update($request->all());

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$request->name' atualizada com sucesso!");
    }
}
