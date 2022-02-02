<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModuleResource;
use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ModuleController extends Controller
{
    protected ModuleRepository $repository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->repository = $moduleRepository;
    }

    public function index($courseId): AnonymousResourceCollection
    {
        $modules = $this->repository->getModulesCourseById($courseId);

        return ModuleResource::collection($modules);
    }

}
