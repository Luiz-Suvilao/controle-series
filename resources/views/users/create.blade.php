<x-layout pageTitle="Criar usuário">
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group mt-3">
            <label
                class="form-label"
                for="name"
            >
                Nome
            </label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
            />
        </div>

        <div class="form-group mt-3">
            <label
                class="form-label"
                for="email"
            >
                E-mail
            </label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
            />
        </div>

        <div class="form-group mt-3">
            <label
                class="form-label"
                for="password"
            >
                Senha
            </label>

            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
            />
        </div>

        <button type="submit" class="btn btn-dark mt-3">
            Criar
        </button>
    </form>
</x-layout>
