<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    #[ArrayShape(['name' => "string", 'description' => "mixed", 'video' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => ucwords(strtolower($this->name)),
        ];
    }
}
