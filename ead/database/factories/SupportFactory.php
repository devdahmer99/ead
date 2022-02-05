<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class SupportFactory extends Factory
{
    protected $model = Support::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['course_id' => "mixed", 'name' => "string"])]
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'lesson_id' => Lesson::factory(),
            'description' => $this->faker->sentence(20),
            'status' => 'P',
        ];
    }
}
