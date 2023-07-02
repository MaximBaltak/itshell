<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResources;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class IndexController extends Controller
{

    public function register (Request $request) {

        try {
            $validated = Validator::make($request->all(),[
                'name' => ['string','required'],
                'email' => ['string','required','email'],
                'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/']
            ]);

            if($validated->fails()) {
                throw new ValidationException($validated);
            }

            $data = $validated->getData();
            $user = User::query()->where('email',$data['email'])->first();
            if($user) {
                return new JsonResponse([
                    'message'=> 'Пользователь уже существует'
                ],ResponseAlias::HTTP_CONFLICT);
            }

            $user = new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_admin' => false
            ]);
            $user->save();
            $accessToken = $user->createToken('auth')->plainTextToken;
            return new JsonResponse([
                'access_token' => $accessToken,
                'user' => new UserResources($user)
            ]);

        } catch (\Illuminate\Validation\ValidationException $exception) {
            return new JsonResponse([
               'message' => $exception->validator->errors()
            ],422);
        }
    }

    public function login (Request $request) {

        try {

            $validated = Validator::make($request->all(),[
                'email' => ['string','required','email'],
                'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/']
            ]);

            if($validated->fails()) {
                throw new ValidationException($validated);
            }
            $data = $validated->getData();
            $user = User::query()->where('email',$data['email'])->first();

            if($user && Hash::check($data['password'],$user->password)){
                $accessToken = $user->createToken('auth')->plainTextToken;
                return new JsonResponse([
                    'access_token'=> $accessToken,
                    'user'=> new UserResources($user)
                ]);
            } else {
                return new JsonResponse([
                    'message' => 'Такого пользователя не существует'
                ],ResponseAlias::HTTP_CONFLICT);
            }
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return new JsonResponse([
                'message' => $exception->validator->errors()
            ],422);
        }
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(null,ResponseAlias::HTTP_OK);
    }
}
