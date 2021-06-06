<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario','noticia_id',
    ];
 
 
    public function noticias()
    {
        return $this->belongsTo(Noticia::class);
    }
}
