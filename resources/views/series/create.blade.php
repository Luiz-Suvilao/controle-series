<x-layout pageTitle="Criação">
    <form action="{{ route('series.store') }}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="name">Nome:</label>
                <input
                    autofocus
                    class="form-control"
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                />
            </div>

            <div class="col-2">
                <label class="form-label" for="seasonsQty">Qtd Temporadas:</label>
                <input
                    class="form-control"
                    type="text"
                    name="seasonsQty"
                    id="seasonsQty"
                    value="{{ old('seasonsQty') }}"
                />
            </div>

            <div class="col-2">
                <label class="form-label" for="episodesQty">Episódios/temporada:</label>
                <input
                    class="form-control"
                    type="text"
                    name="episodesQty"
                    id="episodesQty"
                    value="{{ old('episodesQty') }}"
                />
            </div>
        </div>

        <button type="submit" class="btn btn-dark">Criar</button>
    </form>
</x-layout>
