<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipResource extends JsonResource
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
            'owner_id' => $this->owner_id,
            'description' => $this->description,
            'assets' => AssetResource::collection($this->whenLoaded('asset')),
            'roasts' => RoastResource::collection($this->whenLoaded('roast')),
        ];
    }
}
