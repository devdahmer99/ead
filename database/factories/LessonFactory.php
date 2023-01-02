<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['course_id' => "mixed", 'name' => "string"])]
    public function definition(): array
    {
        $name = $this->faker->unique()->name();

        return [
                'module_id' => Module::factory(),
                'name' => $name,
                'url' => Str::slug($name),
                'video' => Str::random(),
            ];
    }
}
