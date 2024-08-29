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
        Schema::create('livros_assuntos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')->constrained();
            $table->foreignId('assunto_id')->constrained('assuntos', 'codeAs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros_assuntos');
    }
};
