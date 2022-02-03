<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable as JsonSerializableAlias;

/**
 * @property mixed $status
 * @property mixed $statusOptions
 * @property mixed $description
 */
class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializableAlias
     */
    public function toArray($request): array|JsonSerializableAlias|Arrayable
    {
        return [
            'status' => $this->status,
            'status_label' => $this->statusOptions[$this->status],
            'description' => $this->description,

        ];
    }
}
