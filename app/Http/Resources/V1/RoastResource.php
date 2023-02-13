<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class RoastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'availability' => $this->availability,
            'created_date' => $this->created_at->diffForHumans(),
            'capacity' => $this->capacity,
            'bank_account' => $this->bank_account,
            'target_fish' => $this->target_fish,
            'wish_fish' => $this->wish_fish,
            'our_support' => $this->our_support,
            'price' => PriceResource::collection($this->price),
        ];
    }
}
