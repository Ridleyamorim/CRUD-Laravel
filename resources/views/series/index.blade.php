<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-3">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success" role="alert">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}

                <span class="d-flex">
                    <form action="">
                        @csrf
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">E</a>
                    </form>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            X
                        </button>
                    </form>
                </span>
            </li> 
         @endforeach 
    </ul>
</x-layout>