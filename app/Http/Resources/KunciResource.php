<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KunciResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_sentral' => $this->id_sentral,
            'generateCode' => $this->generateCode,
            'unique_code' => $this->unique_code,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // Add other attributes if necessary
        ];
    }
}