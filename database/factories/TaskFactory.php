<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fn() => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
            'category_id' => fn() => Category::inRandomOrder()->first()?->id ?? Category::factory()->create()->id,
            'title' => rtrim(fake()->sentence(4), '.'),
            'description' => fake()->sentence(10),
            'completed' => fake()->boolean(30),
        ];
    }
}
