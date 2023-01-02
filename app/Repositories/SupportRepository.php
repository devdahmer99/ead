<?php

namespace App\Repositories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
    public function createNewSupport(array $data): Model
    {
        $support = $this->getUserAuth()->supports()->create([
            'lesson_id' => $data['lesson'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);

        return $support;
    }

    public function createReplyToSupportId($supportId, array $data)
    {
        $user = $this->getUserAuth();
        $this->getSupport($supportId)
            ->replies()
            ->create([
            'description' => $data['description'],
            'user_id' => $user->id,
        ]);
    }

    private function getSupport(string $id)
    {
        return $this->entity->findOrFail($id);
    }

    private function getUserAuth(): User
    {
        //return auth()->user();
        return User::first();
    }
}
