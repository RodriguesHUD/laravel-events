@extends('layouts.main')

@section('name', 'Editando: ' . $event->name)

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">

        <h1>Editando {{$event->name}}</h1>

        <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction: column;gap: 1rem;">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="/img/events/{{ $event->image }}" alt="" class="img-preview">
            </div>
            <div class="form-group">
                <label for="name">Evento:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do evento" value="{{$event->name}}">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="location">Local:</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Local do evento" value="{{ $event->location }}">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado ?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1"{{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea type="text" name="description" class="form-control" id="description" placeholder="O que vai acontecer no evento ?">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Adcione itens de infraestrutura</label>
                    <div class="form-group">
                            <input type="checkbox" name="items[]" value="cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                            <input type="checkbox" name="items[]" value="palco"> Palco
                    </div>
                    <div class="form-group">
                            <input type="checkbox" name="items[]" value="openBar"> Open Bar
                    </div>
                    <div class="form-group">
                            <input type="checkbox" name="items[]" value="openFood"> Open Food
                    </div>
            </div>

            <button type="submit" class="btn btn-submit" value="Criar o evento" >Editar evento</button>
        </form>
    </div>
@endsection