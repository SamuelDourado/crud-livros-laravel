<?php

namespace App\Http\Controllers;

use App\Exports\LivroRelatorioExport;
use App\LivroRelatorioRepository;
use Illuminate\Http\Request;
use Excel;

class LivroRelatorioController extends Controller
{
    protected $livroRelatorioRepository;

    public function __construct(LivroRelatorioRepository $livroRelatorioRepository)
    {
        $this->livroRelatorioRepository = $livroRelatorioRepository;
    }

    public function export()
    {
        return Excel::download(new LivroRelatorioExport(), 'livros-relatorio.xlsx');
    }
}
