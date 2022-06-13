<x-layout pageTitle="Edição da serie: {!! $series->name !!}">
    <x-series.form
        action="{{ route('series.update', $series->id) }}"
        name="{{ $series->name }}"
        textButton="Editar"
        update="true"
    />
</x-layout>
