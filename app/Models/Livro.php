<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codL',
        'titulo',
        'editora',
        'edicao',
        'anoPublicacao',
        'valor'
    ];

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'livros_assuntos');
    }
}
