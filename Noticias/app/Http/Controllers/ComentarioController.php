<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Noticia;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comentarios = Comentario::latest()->paginate(5);
        return view('comentarios.index',compact('comentarios'))
        ->with('i', (request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     * @param \App\Models\Noticia $noticias
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $noticias= Noticia::all();
        return view('comentarios.create',compact('noticias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Noticia $noticias
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'comentario'=> 'required',
            'noticia_id',
        ]);

        Comentario::create($request->all());

        return redirect()->route('noticias.index')
        ->with('success','Comentario created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @param \App\Models\Noticia $noticias
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @param \App\Models\Noticia $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
        $noticias= Noticia::all();
        return view ('comentarios.edit',compact('comentario','noticias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Noticia $noticias
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
        $request->validate([
            'comentario'=> 'required',
            'noticia_id',
        ]);
    
        $comentario->update($request->all());
    
        return redirect()->route('comentarios.index')
        ->with('success','Comentario updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @param \App\Models\Noticia $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
        $comentario->delete();

        return redirect()->route('comentarios.index')
        ->with('success','Comentario deleted successfully');
    }
}
