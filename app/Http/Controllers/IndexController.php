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
    public function getUser()
    {
        $user = Auth::user();
        return new JsonResponse(new UserResources($user));
    }

    public function register (Request $request) {
        if(Auth::check()) {
            return new JsonResponse([
                'message' => 'Пользователь уже существует'
            ], ResponseAlias::HTTP_CONFLICT);
        }
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
            $user = new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'is_admin' => false
            ]);
            $user->save();
            Auth::login($user);
            return new JsonResponse(new UserResources($user));
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
            $data  = $validated->getData();
            if(Auth::attempt([
                'email' => $data['email'],
                'password'=>$data['password']
            ])){
                return new JsonResponse(new UserResources(Auth::user()));
            } else {
                return new JsonResponse([
                    'message' => 'Такого пользователя не существует'
                ],409);
            }
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return new JsonResponse([
                'message' => $exception->validator->errors()
            ],422);
        }
    }
    public function logout()
    {
        Auth::logout();
        return response()->json([],200)->status();
    }
}
