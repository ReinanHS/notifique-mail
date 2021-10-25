<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    /**
     * Método para retornar todos os usuários pela API.
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        // TODO: Essa implementação deve ter uma alteração futuramente por algo mais otimizado
        $users = User::where('id', '<>', Auth::id())
            ->orderBy('name')
            ->get();

        return UserResource::collection($users);
    }

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
