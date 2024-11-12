
@extends('layouts.main')
@section('section', 'HDC Events')
@section('title', 'Laravel')

@section('content')
        <div id="search-container" class="col-md-12 mb-5">
                <h1>Pesquise por um evento</h1>
                <form action="/" method="GET">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Procure um evento" style="width: 38%;">
                </form>
        </div>

        <div id="events-container" class="col-md-12">
                @if($search)
                <h2>Buscando por: {{$search}}</h2>
                @else
                <h2>Próximos eventos</h2>
                <p>Veja os eventos dos próximos dias</p>
                @endif

                <div id="cards-container" class="d-flex justify-content-center flex-wrap gap-4">
                @foreach($events as  $event)
                        <div class="card col-md-3">
                                <img src="img/events/{{ $event->image }}" alt="{{ $event->title }}" style="width:100%;">
                                <div class="card-body">
                                        <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
                                        <h5 class="card-title">{{ $event->name }}</h5>
                                        <p>{{ $event->title }} -- {{$event->description}}</p>
                                        <p class="card-participants">Participantes: {{ count($event->users)}}</p>
                                        <a href="/events/{{$event->id}}" class="btn">Saiba mais</a>
                                </div>
                        </div>
                @endforeach
                @if(count($events) == 0)
                <p>Não há eventos disponíveis</p>
                @endif
                </div>
        </div>
@endsection
   

