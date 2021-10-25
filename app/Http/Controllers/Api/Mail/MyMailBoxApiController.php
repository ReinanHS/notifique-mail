<?php

namespace App\Http\Controllers\Api\Mail;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailBoxResource;
use App\Models\Mail\Mail;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class MyMailBoxApiController extends Controller
{
    /**
     * Método para exibir no formado de JSON os e-mails pelo usuário autenticado.
     * @return AnonymousResourceCollection
     */
    public function __invoke(): AnonymousResourceCollection
    {
        return MailBoxResource::collection($this->getMyMails());
    }

    /**
     * Método para obter os e-mails recebidos pelo usuário autenticado.
     * @return LengthAwarePaginator
     */
    private function getMyMails(): LengthAwarePaginator
    {
        return Mail::whereMailTo(Auth::user()->email)->orderByDesc('created_at')->paginate(15);
    }
}
