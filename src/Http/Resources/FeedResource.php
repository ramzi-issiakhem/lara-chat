<?php

namespace Ramzi\LaraChat\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeedResource extends JsonResource
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
            'name' => $this->name,
            'feed_owner' => $this->feedOwner,
            'threads_count' => $this->whenLoaded('threads', $this->threads->count()) ?? 0,
            'threads' => ThreadResource::collection($this->whenLoaded('threads')),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
