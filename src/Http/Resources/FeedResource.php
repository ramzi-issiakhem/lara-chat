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
        $threads = $this->whenLoaded('threads');
        if (!$threads) {
            $this->threads_count = $this->threads->count();
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'feed_owner' => $this->feedOwner,
            'threads_count' => $this->threads_count ?? 0,
            'threads' => ThreadResource::collection($threads),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
