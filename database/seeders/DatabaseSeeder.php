<?php

namespace Database\Seeders;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\LivroFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Livro::factory(10)->create();
        Assunto::factory(5)->create()->each(function ($assunto) {
            $assunto->livros()->attach([rand(1, 10), rand(1, 10)]);
        });
        Autor::factory(3)->create();


    }
}
