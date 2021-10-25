<?php

namespace App\Http\Controllers\Api\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\StoreMailRequest;
use App\Http\Resources\Mail\MailResource;
use App\Http\Services\Mail\MailServices;
use App\Models\Mail\Mail;
use Illuminate\Http\JsonResponse;
use Throwable;

class MailApiController extends Controller
{
    /**
     * @var MailServices
     */
    protected $service;

    /**
     * @param MailServices $service
     */
    public function __construct(MailServices $service)
    {
        $this->service = $service;
    }

    /**
     * Método para retornar um JSON com as informações do endereço eletrônico que está sendo passando.
     * @param Mail $mail
     * @return MailResource
     */
    public function show(Mail $mail): MailResource
    {
        return MailResource::make($mail);
    }

    /**
     * Método para cadastrar um email.
     * @param StoreMailRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(StoreMailRequest $request): JsonResponse
    {
        return $this->service->create($request->all());
    }
}
