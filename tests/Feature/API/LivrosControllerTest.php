<?php

namespace Tests\Feature\API;

use App\Models\Livro;
use Database\Factories\LivroFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LivrosControllerTest extends TestCase
{

    use RefreshDatabase;

    public function test_get_livros_endpoint(): void
    {
        $livros = Livro::factory(10)->create();
        $response = $this->getJson('/api/livros');

        $response->assertStatus(200);
        $response->assertJsonPath('meta.total', 10);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'codL',
                    'titulo',
                    'editora',
                    'edicao',
                    'anoPublicacao'
                ],
            ],
            'meta' => [
                'current_page',
                'last_page',
                'per_page',
                'total',
            ],
        ]);
    }

    public function test_get_single_livro_endpoint(): void
    {
        $livro = Livro::factory(10)->create();
        $response = $this->getJson('/api/livros/1');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'codL',
                'titulo',
                'editora',
                'edicao',
                'anoPublicacao'
            ],
        ]);
    }

    public function test_post_livro_endpoint(): void
    {
        $livro = Livro::factory(1)->makeOne();

        $response = $this->postJson('/api/livros/', $livro->toArray());

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'codL',
                'titulo',
                'editora',
                'edicao',
                'anoPublicacao'
            ],
        ]);

        $response->assertJson(function (AssertableJson $json) use($livro) {
            $json->whereAll([
                'data.codL' => $livro->codL,
                'data.titulo' => $livro->titulo,
                'data.editora' => $livro->editora,
                'data.edicao' => $livro->edicao,
                'data.anoPublicacao' => $livro->anoPublicacao
            ]);
        });
    }

    public function test_put_livro_endpoint(): void
    {
        Livro::factory(1)->create();
        $livro = Livro::factory(1)->makeOne();

        $response = $this->putJson('/api/livros/1', $livro->toArray());

        $response->assertStatus(200);

    }
}
