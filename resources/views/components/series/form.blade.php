<form action="{{ $action }}" method="post">
    @csrf

    @isset($update)
        @method('PUT')
    @endisset
    <div class="mb-3">
        <label class="form-label" for="name">Nome:</label>
        <input class="form-control" type="text" name="name" id="name" @isset($name) value="{{ $name }}"@endisset />
    </div>

    <button type="submit" class="btn btn-dark">{{ $textButton }}</button>
</form>
