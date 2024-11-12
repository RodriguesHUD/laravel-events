@extends('layouts.main')

@section('name', 'Criar Evento')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">

        <h1>Crie o seu próprio evento</h1>

        <form action="/events" method="POST" enctype="multipart/form-data" style="display: flex;flex-direction: column;gap: 1rem;">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do evento</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="name">Evento:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="location">Local:</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado ?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea type="text" name="description" class="form-control" id="description" placeholder="O que vai acontecer no evento ?"></textarea>
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

            <button type="submit" class="btn btn-submit" value="Criar o evento" >Enviar</button>
        </form>
    </div>
@endsection