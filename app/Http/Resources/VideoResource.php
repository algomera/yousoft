<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'name' => $this->name,
            'video' => $this->video,
            'description' => $this->description,
            'reference' => $this->reference,
            'position' => $this->position,
            'inspection_date' => $this->inspection_date,
            'date' => $this->created_at->format('d/m/y')
        ];
    }
}
