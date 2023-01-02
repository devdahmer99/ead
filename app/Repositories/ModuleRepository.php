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
                    ->where('course_id', $courseId)
                    ->get();
    }

}
