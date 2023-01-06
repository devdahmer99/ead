<?php

namespace App\Repositories;

use App\Models\Module;

class ModuleRepository
{
    protected Module $entity;

    public function __construct(Module $model)
    {
        $this->entity = $model;
    }

    public function getModulesCourseById(string $courseId)
    {
        return $this->entity
                    ->with('lesson.views')
                    ->where('course_id', $courseId)
                    ->get();
    }

}
