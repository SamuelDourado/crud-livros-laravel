<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codL' => $this->faker->isbn10(),
            'titulo' => $this->faker->sentence,
            'editora' => $this->faker->company,
            'edicao' => $this->faker->numberBetween(1, 20),
            'anoPublicacao' => $this->faker->year
        ];
    }
}
