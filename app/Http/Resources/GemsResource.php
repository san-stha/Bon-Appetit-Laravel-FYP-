<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'points' => $this->points,
            'user_id' => $this->user_id,
            'restaurant_id' => $this->restaurant_id,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at,
        ];
    }
}
