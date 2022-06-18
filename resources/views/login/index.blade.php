<x-layout pageTitle="Login">
    <form method="post">
        @csrf
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

        <button class="btn btn-dark mt-3">
            Entrar
        </button>

        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">Criar nova conta</a>
    </form>
</x-layout>
