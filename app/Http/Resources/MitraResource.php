<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MitraResource extends JsonResource
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
            'mitras_id' => $this->mitras_id,
            'nama_perusahaan_mitra' => $this->nama_perusahaan_mitra,
            'nama_petugas' => $this->nama_petugas,
            'pekerjaan' => $this->pekerjaan,
            'id_sentral' => $this->id_sentral,
            // Add other attributes of the Mitra model as needed
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
