<?php

namespace Ramzi\LaraChat\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThreadResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
