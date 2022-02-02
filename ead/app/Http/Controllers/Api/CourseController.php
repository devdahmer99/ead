<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CourseController extends Controller
{
    protected CourseRepository $repository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function index(): AnonymousResourceCollection
    {
        return CourseResource::collection($this->repository->getAllCourses());
    }

    public function show($id): CourseResource
    {
        return new CourseResource($this->repository->getCourse($id));
    }
}
