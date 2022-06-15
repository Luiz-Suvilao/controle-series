<x-layout pageTitle="Episódios">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}

                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" />
                </li>
            @endforeach
        </ul>

        <button type="submit" class="btn btn-dark mt-2 mb-2">Salvar</button>
    </form>
</x-layout>