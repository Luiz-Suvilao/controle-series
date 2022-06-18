<x-layout pageTitle="Episódios" :messageSuccess="$messageSuccess">
    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}
                    @auth
                    <input
                        type="checkbox"
                        name="episodes[]"
                        value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif
                    />
                    @endauth
                </li>
            @endforeach
        </ul>
        @auth
        <button type="submit" class="btn btn-dark mt-2 mb-2">Salvar</button>
        @endauth
    </form>
</x-layout>
