<!-- titulo, noticia, imagen -->

@extends('noticias.layout')

@section('content')

<div class="row text-center">
  <h2>Crear Noticia</h2>

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
    <form class="row g-3 needs-validation" action="{{route('noticias.store')}}"  method="POST">
    @csrf
          <div class="col-md-9">
            <label for="titulo" class="visually-hidden"></label>
            <input 
              type="text" 
              name="titulo"
              id="titulo" 
              class="form-control" 
              placeholder="Titulo de la noticia" 
              required
            >
          </div>
          <div class="col-md-3">
            <label for="fecha" class="visually-hidden"></label>
            <input 
              type="date" 
              name="fecha" 
              id="fecha" 
              class="form-control" 
              required
            >
          </div>
          <div class="mb-3">
            <label for="floatingTextarea2"></label>
            <textarea
              type="text"
              name="texto" 
              id="texto" 
              class="form-control" 
              placeholder="Escribe la noticia aqui" 
              style="height: 300px"
              required
            ></textarea>
          </div>

          <div>
              <a class="btn btn-danger" href="{{ route('noticias.index') }}">
                <i class="bi bi-arrow-left"> Atras</i>
              </a>
              <button class="btn btn-success" type="submit"><i class="bi bi-save"></i> Subir</button>
          </div>
    </form>
  </div>
</div>

@endsection