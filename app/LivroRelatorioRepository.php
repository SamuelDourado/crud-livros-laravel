<?php

namespace App;

use Illuminate\Support\Facades\DB;

class LivroRelatorioRepository
{
    public function getAllLivros()
    {
        return DB::table('livros_relatorio_view')->get();
    }

    public function getLivroById($id)
    {
        return DB::table('livros_relatorio_view')->find($id);
    }
}
