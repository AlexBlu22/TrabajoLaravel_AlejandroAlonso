<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Comentario;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $noticias = Noticia::latest()->paginate(10);
        return view('noticias.index',compact('noticias'))
        ->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Redirige a 'noticias\create.blade.php'
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida y sube la noticia
        $request->validate([
            'titulo'=> 'required',
            'texto'=> 'required',
            'fecha'=> 'required',
        ]);

        Noticia::create($request->all());

        return redirect()->route('noticias.index')
        ->with('success','noticias created successfully');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Comentario  $comentario
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        // Ver la noticia seleccionada
        $comentarios=Comentario::all();
        return view ('noticias.show',compact('noticia','comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        // Editar la noticia
        return view ('noticias.edit',compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
        $request->validate([
            'titulo'=> 'required',
            'texto'=> 'required',
            'fecha'=> 'required',
        ]);
    
        $noticia->update($request->all());
    
        return redirect()->route('noticias.index')
        ->with('success','noticias created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        // Elimina
        $noticia->delete();

        return redirect()->route('noticias.index')
        ->with('success','noticias deleted successfully');
    }
}
