<x-layout pageTitle="Edição da serie: {!! $series->name !!}">
    <form action="{{ route('series.update', $series->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="name">Nome:</label>
                <input
                    autofocus
                    class="form-control"
                    type="text"
                    name="name"
                    id="name"
                    value="{{ $series->name }}"
                />
            </div>

            <div class="col-2">
                <label class="form-label" for="seasonsQty">Qtd Temporadas:</label>
                <input
                    class="form-control"
                    type="text"
                    name="seasonsQty"
                    id="seasonsQty"
                    disabled
                    value="{{ $seasons->count() }}"
                />
            </div>

            <div class="col-2">
                <label class="form-label" for="episodesQty">Episódios/temporada:</label>
                <input
                    class="form-control"
                    type="text"
                    name="episodesQty"
                    id="episodesQty"
                    disabled
                    value="{{ $seasons->first()->episodes->count() }}"
                />
            </div>
        </div>

        <button type="submit" class="btn btn-dark">Editar</button>
    </form>

</x-layout>
