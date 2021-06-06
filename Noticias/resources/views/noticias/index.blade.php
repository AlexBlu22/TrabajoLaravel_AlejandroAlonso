@extends('noticias.layout')

@section('content')

<div class="row text-center">
  <h2>Noticias</h2>
    <div class="row justify-content-center">
      <div class="col col-12">
        <a class="btn btn-primary" href="{{ route('noticias.create') }}">
          <i class="bi bi-plus-circle-fill"></i> Nueva Noticia</a>
      </div>
    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
      {{ $message }}
    </div>
  @endif

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Titulo</th>
        <th width="152px">Opciones</th>
      </tr>
    </thead>

    @foreach ($noticias as $noticia)
    <tbody>
      <tr>
        <td>{{ $noticia->fecha }}</td>
        <td>{{ $noticia->titulo }}</td>
        <td>
          <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
            <a class="btn btn-secondary" href="{{ route('noticias.show', $noticia->id) }}"><i class="bi bi-egg-fried"></i></a>
            <a class="btn btn-info" href="{{ route('noticias.edit', $noticia->id) }}"> <i class="bi bi-pencil"></i></a>
            @csrf
            @method('DELETE')
              <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i>
              </button>
          </form>
        </td>
      </tr>
    </tbody>
    @endforeach
  </table>

</div>

@endsection