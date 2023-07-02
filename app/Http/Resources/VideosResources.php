<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VideosResources extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'videos'=> $this->collection->map(function ($video) {
                    return [
                     'video_id' => $video->video_id,
                     'title'=> $video->title,
                     'video'=> $video->video,
                     'img'=> $video->img,
                        'user'=> new UserResources($video->user)
                    ];
            } )
        ];
    }
}
