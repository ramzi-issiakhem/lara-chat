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
            'feeds' => $this->whenLoaded('feeds', function () {
                return $this->feeds->map(function ($feed) {
                    return [
                        'id' => $feed->id,
                        'feed_owner_id' => $feed->feed_owner_id,
                        'name' => $feed->name,
                        'created_at' => $feed->created_at,
                        'updated_at' => $feed->updated_at,
                        'deleted_at' => $feed->deleted_at,
                    ];
                });
            }),
            //TODO Display the participants
//            'participants' => $this->whenLoaded('participants')
            'name' => $this->name,
            'type' => $this->type,
            'color' => $this->color,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
