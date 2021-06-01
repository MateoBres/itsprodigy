@extends('layouts.layout')

    @section('content')
        <h1>Content of the page</h1>

        <table class="table table-borderless table-striped table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Foto</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>Categoria</th>
            </tr>
            </thead>
            <tbody>
            @foreach($apps as $app)
                <tr>
                    <td>{{ $app->name }}</td>
                   {{--Stampo l'ultima immagine che e' la piu' grande--}}
                    @for($i=count(explode(', ', $app->image))-1; $i>count(explode(', ', $app->image))-2; $i--)
                        <td>
                            <img src="{{ explode(', ', $app->image)[$i] }}" >
                        </td>
                    @endfor
                    <td><div style="height:95px; overflow:hidden">{{ $app->summary }}</div></td>
                    <td>{{ $app->price }}</td>
                    <td>{{ $app->category }}</td>
                    <td>
                        <a href="/show/{{ $app->idApp }}" class="btn btn-outline-secondary">
                            Dettaglio
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        Comandi a pie di pagina per la paginazione--}}
            {{$apps->links()}}
    @endsection

