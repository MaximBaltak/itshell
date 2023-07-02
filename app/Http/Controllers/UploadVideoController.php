<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveVideoRequest;
use App\Http\Resources\VideoResource;
use App\Http\Resources\VideosResources;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class UploadVideoController extends Controller
{
    public function save(SaveVideoRequest $request):JsonResponse {
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
                'name_folder'=> $videoName,
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
    public function getVideos (Request $request) {
        $user = $request->user();
        try {
            $videos = Video::query()->where('user_id',$user->id)->get();
            if($videos) {
                return new JsonResponse(new VideosResources($videos),200);
            }
            return new JsonResponse(['videos'=>[]],200);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'message' => $exception->getMessage()
            ],500);
        }
    }
    /**
    метод не трубующий авторизации
     */
    public function getVideosAll (Request $request) {
        try {
            $videos = Video::all();
            if($videos) {
                return new JsonResponse(new VideosResources($videos),200);
            }
            return new JsonResponse(['videos'=>[]],200);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'message' => $exception->getMessage()
            ],500);
        }
    }
    public function removeVideo (Request $request,string $id) {
        try {
            $video_id = (int) is_numeric($id) ? $id : null;

            $video = Video::query()->where('video_id',$video_id)->first();
            if($video){
                Storage::disk('public')->deleteDirectory('videos/'.$request->user()->email.'/'.$video->name_folder);
                $video->delete();
                return new JsonResponse([
                    'message'=> 'Видео удалено'
                ],200);
            } else {
                return new JsonResponse([
                    'message'=> 'Видео не найдено'
                ],500);
            }

        } catch (\Exception $exception) {
            return new JsonResponse([
                'message' => $exception->getMessage()
            ],500);
        }
    }
    public function getVideo (Request $request,string $id) {
        try {
            $video_id = (int) is_numeric($id) ? $id : null;

            $video = Video::query()->find($video_id);
            if($video) {
                return new JsonResponse(new VideoResource($video),200);
            }
            return new JsonResponse([],200);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'message' => $exception->getMessage()
            ],500);
        }
    }
}
