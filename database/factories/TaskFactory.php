<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 1),
            'priority' => $this->faker->numberBetween(1,3),
            'due_date' => $this->faker->date("Y-m-d H:i:s"),
            'published_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
