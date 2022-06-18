<x-layout pageTitle="Listagem" :messageSuccess="$messageSuccess">
    @auth
    <a class="btn btn-dark mb-2" href="{{ route('series.create') }}"> Criar </a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->name }}
                </a>
                @auth
               <span class="d-flex">
                   <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
               </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>
