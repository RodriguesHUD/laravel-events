@extends('layouts.main')

@section('title', $event->name)

@section('content')


    <div class="col md-10">
        <div class="container">
            <div class="container-top">
                <div id="image-container" class="image-container">
                    <img src="/img/events/{{$event->image}}" class="img-fluid" alt="">
                
                    <div class="image-description">
                        <div class="" id="description-container">
                        <h2>Sobre o evento:</h2>
                        <p class="event-description">{{$event->description}}</p>
                    
                        <ul id="items-list" class="items-list">
                            @if(!empty($event->items)) 
                            <h3>O evento conta com:</h3>
                            @foreach($event->items as $item)
                            <li>\{{$item}}</li>
                            @endforeach
                        @endif 
                        </ul>
                        <form action="/events/join/{{ $event->id }}" method="POST">
                           @csrf
                            <a href="/events/join/{{ $event->id }}" class="confirm-presence" id="event-submit"
                                onclick="event.preventDefault();
                                this.closest('form').submit();"
                                >Confirmar presença
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div id="info-container" class="info-container">
                <h1>{{$event->name}}</h1>
                <span>Data do evento: {{date('d/m/Y', strtotime($event->date))}}</span>
                <p class="event-city">Local: {{$event->location}}</p>
                <p class="events-participants">participantes: {{ count($event->users)}}</p>
                @if(!empty($eventOwner) && isset($eventOwner->name))
                    <p class="event-owner" name="star-outline">Criador do evento: {{ $eventOwner->name }}</p>
                @else
                    <p class="event-owner" name="star-outline">Criador do evento: Informação indisponível</p>
                @endif
                
                </div>
            </div>

        </div>
    </div>

@endsection