@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Crie o seu evento</h1>
  <form id="form-evento" action="/events" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario();">
    @csrf
    <div class="form-group">
      <label for="image">Imagem do Evento:</label>
      <input type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Evento:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
    </div>
    <div class="form-group">
      <label for="date">Data do evento:</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
      <label for="title">Cidade:</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
    </div>
    <div class="form-group">
      <label for="title">O evento é privado?</label>
      <select name="private" id="private" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
    </div>
    <div class="form-group">
      <label for="title">Adicione itens de infraestrutura:</label>
      <div class="form-group form-group form-check d-flex align-items-center" items">
        <input id="cadeiras" type="checkbox"  name="items[]" value="Cadeiras"> <label for="cadeiras">Cadeiras</label>
      </div>
      <div class="form-group form-group form-check d-flex align-items-center" items">
        <input id="palco" type="checkbox"  name="items[]" value="Palco"> <label for="palco">Palco</label>
      </div>
      <div class="form-group form-group form-check d-flex align-items-center" items">
        <input id="cerveja" type="checkbox"  name="items[]" value="Cerveja grátis"> <label for="cerveja">Cerveja grátis</label>
      </div>
      <div class="form-group form-group form-check d-flex align-items-center" items">
        <input id="food" type="checkbox"  name="items[]" value="Open Food"> <label for="food">Open food</label>
      </div>
      <div class="form-group form-check d-flex align-items-center" items">
        <input id="brindes" type="checkbox"  name="items[]" value="Brindes"> <label for="brindes">Brindes</label>
      </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Evento">
  </form>
</div>

@endsection
