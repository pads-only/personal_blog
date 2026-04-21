<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => fake()->sentence(5),
            'slug' => fake()->word(),
            'content' => json_encode([
                'time' => fake()->time(),
                'blocks' => [
                    'type' => 'paragraph',
                    'data' => [
                        'text' => fake()->paragraph(20),
                    ]
                ],
            ]),
            'status' => 'draft',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
