@extends('noticias.layout')

@section('content')

<div class="row text-center">
  <h2>Noticia</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
        <p><strong>Whoops!</strong> There were some problems with your input.</p>
        <ul>
            @foreach ($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <!-- Visualizacion de la noticia -->
  <div class="container-sm">
          <div class="col-md">
          <p><h4>{{ $noticia->titulo }}</h4><h6>({{ $noticia->fecha }})</h6></p>
            <hr>
          </div>
          <div class="mb-3">
            <p>{{ $noticia->texto }}</p>
            <hr>
          </div>
          <div class="mb-3">
            @foreach ($comentarios as $comentario)
              <p>{{ $comentario->comentario }}</p>
            @endforeach
          </div>

          <div>
              <a class="btn btn-danger" href="{{ route('noticias.index') }}">
                <i class="bi bi-arrow-left"> Atras</i>
              </a>
              <a class="btn btn-info" href="{{ route('comentarios.create', $noticia->id) }}">
                <i class="bi bi-chat-left"> Comentarios</i>
              </a>
          </div>
  </div>
</div>

@endsection