<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LivrosControllerTest extends TestCase
{

    public function test_get_livros_endpoint(): void
    {
        $response = $this->getJson('/api/livros');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }
}
