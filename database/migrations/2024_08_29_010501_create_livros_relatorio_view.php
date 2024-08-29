<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (app()->environment('testing')) {
            return ;
        }

        \Illuminate\Support\Facades\DB::statement("
        CREATE OR REPLACE VIEW livros_relatorio_view (
            idL,
            tituloL,
            assuntosL
        ) AS
        SELECT
            l.id,
            l.titulo,
            GROUP_CONCAT(a.descricao  SEPARATOR ', ') AS assuntos
        FROM
            livros l
        INNER JOIN livros_assuntos la ON l.id = la.livro_id
        INNER JOIN assuntos a ON la.assunto_id  = a.codeAs
        GROUP BY
            l.id, l.titulo;
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->environment('testing')) {
            return ;
        }

        \Illuminate\Support\Facades\DB::statement("
            DROP VIEW IF EXISTS livros_relatorio_view;
        ");
    }
};
