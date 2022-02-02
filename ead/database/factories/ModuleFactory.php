<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class ModuleFactory extends Factory
{
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    #[ArrayShape(['course_id' => "\Illuminate\Database\Eloquent\Factories\Factory", 'name' => "string"])]
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'name' => $this->faker->name(),
        ];
    }
}
