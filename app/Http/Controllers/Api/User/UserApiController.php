<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * Método para retornar o usuário que está autenticado pela API.
     * @param Request $request
     * @return UserResource
     */
    public function me(Request $request): UserResource
    {
        return UserResource::make($request->user());
    }
}
