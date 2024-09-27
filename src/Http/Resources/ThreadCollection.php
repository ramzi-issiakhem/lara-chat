<?php

namespace Ramzi\LaraChat\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ThreadCollection extends ResourceCollection
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        if ($this->collection->isEmpty()) {
            return [];
        }

        return [
            "status" => "success",
            "data" => $this->collection,
        ];
    }
}
