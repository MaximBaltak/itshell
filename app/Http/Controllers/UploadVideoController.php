<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveVideoRequest;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class UploadVideoController extends Controller
{
    public function save(SaveVideoRequest $request):JsonResponse{
        $user = $request->user();

        $video = $request->file('video');
        $image = $request->file('image');
        $title = $request->input('title');

        try {
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('public')->putFileAs('videos/'.$user->email.'/'.$videoName, $video, $videoName);
            Storage::disk('public')->putFileAs('videos/'.$user->email.'/'.$videoName, $image, $imageName);

            $videoUrl = Storage::url('videos/'.$user->email.'/'.$videoName.'/'.$videoName);
            $imageUrl = Storage::url('videos/'.$user->email.'/'.$videoName.'/'.$imageName);
            $video = new Video([
                'title'=>$title,
                'video'=>$videoUrl,
                'img'=>$imageUrl,
                'user_id'=>$user->id
            ]);
            $video->save();
            return new JsonResponse([
                'message' => 'Видео загружено',
            ],200);
        }catch (\Exception $exception) {
            return new JsonResponse([
                'message' => $exception->getMessage(),
            ],500);
        }
    }
}
