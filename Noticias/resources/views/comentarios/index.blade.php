@extends('comentarios.layout')

@section('content')

<div class="row text-center">
  <h2>Comantarios</h2>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
      {{ $message }}
    </div>
  @endif

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>Noticia</th>
        <th>Comentario</th>
        <th width="152px">Opciones</th>
      </tr>
    </thead>

    @foreach ($comentarios as $comentario)
    <tbody>
      <tr>
        <td>{{ $comentario->noticia_id }}</td>
        <td>{{ $comentario->comentario }}</td>
        <td>
          <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('comentarios.edit', $comentario->id) }}"> <i class="bi bi-pencil"></i></a>
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