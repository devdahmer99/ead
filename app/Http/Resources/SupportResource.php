<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use JsonSerializable as JsonSerializableAlias;

/**
 * @property mixed $status
 * @property mixed $statusOptions
 * @property mixed $description
 * @property mixed $user
 * @property mixed $lesson
 */
class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializableAlias
     */
    #[Pure] #[ArrayShape(['status' => "mixed", 'status_label' => "mixed", 'description' => "mixed", 3 => "string"])]
    public function toArray($request): array|JsonSerializableAlias|Arrayable
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'status_label' => $this->statusOptions[$this->status] ?? 'Not found status',
            'description' => $this->description,
            'user' => new UserResource($this->user),
            'lesson' => new LessonResource($this->lesson),
        ];
    }
}
