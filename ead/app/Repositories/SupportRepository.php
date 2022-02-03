<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class SupportRepository
{
    protected Support $entity;

    public function __construct(Support $model)
    {
        $this->entity = $model;
    }

    public function getSupports(array $filters = []): Collection
    {
        return $this->getUserAuth()
                            ->supports()
                            ->where(function ($query) use ($filters) {
                                if (isset($filters['lesson'])) {
                                    $query->where('lesson_id', $filters['lesson']);
                                }

                                if (isset($filters['filter'])) {
                                    $filter = $filters['filter'];
                                    $query->where('description', 'LIKE', "%{$filter}%");
                                }
                            })
                            ->get();
    }

    private function getUserAuth(): User
    {
        //return auth()->user();
        return User::first();
    }
}
