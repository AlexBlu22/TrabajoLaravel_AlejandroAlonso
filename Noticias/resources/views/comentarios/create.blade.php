<!-- comentario, noticia_id -->

@extends('comentarios.layout')

@section('content')

<div class="row text-center">
  <h2>Crear Comentario</h2>

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

  <!-- Creacion de noticias -->
  <div class="container-sm">
    <form class="row g-3 needs-validation" action="{{route('comentarios.store')}}"  method="POST">
    @csrf
          <div class="col-md-4">
            <label for="noticia_id" class="visually-hidden"></label>
            <select class="form-select" name="noticia_id" id="noticia_id" aria-label="Seleccione la noticia">
              @foreach ($noticias as $noticia)
                <option value="{{$noticia->id}}">{{$noticia->titulo}}</option>
              @endforeach
            </select>
          </div>
          
          <div class="mb-3">
            <label for="floatingTextarea2"></label>
            <textarea
              type="text"
              name="comentario" 
              id="comentario" 
              class="form-control" 
              placeholder="Escribe el comentario" 
              style="height: 300px"
              required
            ></textarea>
          </div>

          <div>
              <a class="btn btn-danger" href="{{ route('comentarios.index') }}">
                <i class="bi bi-arrow-left"> Atras</i>
              </a>
              <button class="btn btn-success" type="submit"><i class="bi bi-save"></i> Subir</button>
          </div>
    </form>
  </div>
</div>

@endsection