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

    public function getMySupports(Support $model)
    {
        $filters['user'] = true;

        return $this->getSupports($filters);
    }

    public function getSupports(array $filters = []): Collection
    {
        return $this->getUserAuth()
                            ->supports()
                            ->where(function ($query) use ($filters) {
                                if (isset($filters['lesson'])) {
                                    $query->where('lesson_id', $filters['lesson']);
                                }

                                if(isset($filters['status'])) {
                                    $query->where('status', $filters['status']);
                                }

                                if (isset($filters['filter'])) {
                                    $filter = $filters['filter'];
                                    $query->where('description', 'LIKE', "%{$filter}%");
                                }

                                if(isset($filters['user'])) {
                                    $user = $this->getUserAuth();
                                    $query->where('user_id', $user->id);
                                }
                            })
                            ->with('replies')
                            ->orderBy('updated_at')
                            ->get();
    }
    public function createNewSupport(array $data): Support
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
