<?php
namespace App\Repositories;
use App\Models\ReplySupport;
use App\Repositories\Traits\RepositoryTrait;


class ReplySupportRepository
{
    use RepositoryTrait;

    protected $entity;

    public function __contruct(ReplySupport $model)
    {
        $this->entity = $model;
    }

    public function createReplySupport(array $data)
    {
        $user = $this->getUserAuth();

        return $this->entity->create([
            'support_id' => $data['support'],
            'description' => $data['description'],
            'user_id' => $user->id
        ]);
    }
}
