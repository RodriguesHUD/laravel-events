
@extends('layouts.main')
@section('section', 'HDC Events')
@section('title', 'Laravel')

@section('content')
        <div id="search-container" class="search-container">
                <div class="search-container-content">
                        <h1>Pesquise por um evento</h1>
                        <form action="/" method="GET" class="search-container-content-form">
                                <input type="text" id="search" name="search" class="form-control" placeholder="Ex: Music Festival" >
                        </form>
                </div>
        </div>

        <div id="events-container" class="events-container">
                <div class="events-title">
                        <div class="events-title-text">
                                @if($search)
                                <h2>Buscando por: {{$search}}</h2>
                                @else
                                <h2>Próximos eventos</h2>
                                <p>Veja os eventos dos próximos dias</p>
                                @endif
                        </div>
                        <button class="new-event-btn">
                                <ion-icon name="add-outline"></ion-icon>
                                <a href="/events/create">NOVO EVENTO</a>
                        </button>
                </div>

                <div id="cards-container" class="d-flex justify-content-center flex-wrap gap-4">
                @foreach($events as  $event)
                        <div class="custom-card">
                                <img src="img/events/{{ $event->image }}" alt="{{ $event->title }}">
                                <div class="card-body">
                                        <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
                                        <h5 class="card-title">{{ $event->name }}</h5>
                                        <p class="card-description">{{ $event->title }} - {{$event->description}}</p>
                                        <p class="card-participants">Participantes: {{ count($event->users)}}</p>
                                        <a href="/events/{{$event->id}}" class="about-more-btn">Saiba mais</a>
                                </div>
                        </div>
                @endforeach
                @if(count($events) == 0)
                <p>Não há eventos disponíveis</p>
                @endif
                </div>
        </div>
@endsection
   

