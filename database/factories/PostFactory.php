<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'slug' => fake()->slug(3),
            'content' => json_encode([
                'title' => fake()->sentence(5),
                'content' => fake()->paragraph(10),
                'tags' => fake()->words(4)
            ]),
            'status' => 'draft',
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
