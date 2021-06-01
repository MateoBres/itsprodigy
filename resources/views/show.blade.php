@extends('layouts.layout')

@section('content')
    <h1>Dettagli applicazione</h1>

    <div class="card" style="width: 100%;">
        {{-- Stampo l'ultima immagine che e' la piu' grande--}}
        @for($i=count(explode(', ', $app->image))-1; $i>count(explode(', ', $app->image))-2; $i--)
            <img style="width: 30%" class="card-img-top" alt="image-{{$app->name}}" src="{{ explode(', ', $app->image)[$i] }}" >
        @endfor
        <div class="card-body">
            <h2 class="card-title mt-3">{{ $app->name }}</h2></div>
            <h6 class="card-subtitle m-1 ml-3 text-muted"><b>Autore:</b> {{ $app->artist }}</h6>
            <h6 class="card-subtitle m-1 ml-3 text-muted"><b>Tipologia:</b> {{ $app->type }}</h6>
            <h6 class="card-subtitle m-1 ml-3 text-muted"><b>Categoria:</b> {{ $app->category }}</h6>
            <p class="card-text m-3">{{ $app->summary }}</p>
            <h6 class="card-title m-3">Links:</h6>
            @foreach(explode(', ', $app->link) as $link)
                <a href="#" class="card-link ml-3 mb-17">{{ $link }}</a>
            @endforeach
        </div>
    </div>


@endsection
