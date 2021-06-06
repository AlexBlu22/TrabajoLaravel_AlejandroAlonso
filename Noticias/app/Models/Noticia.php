<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo','texto','fecha'
    ];
 
 
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
