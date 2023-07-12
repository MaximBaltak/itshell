<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResources;
use App\Http\Resources\UsersResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function getUser (Request $request) {
        try {
            return new UserResources($request->user());
        } catch (\Exception $exception) {
            return new JsonResponse([
                'message'=> $exception->getMessage()
            ],500);
        }
    }
    public function getUsers (Request $request) {
        try {
            $users = User::all();
            return new JsonResponse(new UsersResource($users));
        } catch (\Exception $exception) {
            return new JsonResponse([
                'message'=> $exception->getMessage()
            ],500);
        }
    }
}
