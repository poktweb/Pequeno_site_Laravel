@extends('layouts.main') {{-- Chama o Layout criado no caso o main --}}
@section('title', $event->title) {{-- Define o Titulo da Pagina --}}
@section('content') {{-- Define o conteudo da pagina --}}

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            </div>

            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                <p class="events-participants"><ion-icon name="people-outline"></ion-icon>X - Participantes</p>
                <p class="events-awner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}</p>
                <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
                <h3>O Evento conta com:</h3>
                <ul id="itens-list">
                    @foreach($event->itens as $item)
                            <li><ion-icon name="play-outline"></ion-icon> {{ $item }} </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                <p class="event-description"><span>{{ $event->description }}</span></p>
            </div>
        </div>
    </div>

@endsection {{-- Determina o fim da Section de Conteudo da Pagina --}}