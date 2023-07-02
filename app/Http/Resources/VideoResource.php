<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'video_id' => $this->video_id,
            'title'=> $this->title,
            'video'=> $this->video,
            'img'=> $this->img,
            'user'=> new UserResources($this->user)
        ];
    }
}
