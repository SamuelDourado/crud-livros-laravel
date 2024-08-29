<?php

namespace App\Exports;

use App\LivroRelatorioRepository;
use Maatwebsite\Excel\Concerns\FromCollection;

class LivroRelatorioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $livroRelatorioRepository = new LivroRelatorioRepository();
        return $livroRelatorioRepository->getAllLivros();
    }
}
