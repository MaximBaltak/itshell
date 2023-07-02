<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResources;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UsersController extends Controller
{
    public function getUser (Request $request) {
        return new UserResources($request->user());
    }
}
