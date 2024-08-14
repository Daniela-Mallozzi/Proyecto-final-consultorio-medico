<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,  // Genera una oración como título
            'subtitle' => $this->faker->text(100),  // Genera un texto corto para el subtítulo
            'url' => $this->faker->url,  // Genera una URL
            'image' => $this->faker->imageUrl(1080, 500), // Genera una URL de imagen falsa
        ];
    }
}
