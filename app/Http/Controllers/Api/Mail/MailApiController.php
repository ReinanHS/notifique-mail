<?php

namespace App\Http\Controllers\Api\Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\StoreMailRequest;
use App\Http\Resources\Mail\MailResource;
use App\Models\Mail\Mail;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class MailApiController extends Controller
{
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
        try {
            DB::beginTransaction();

            Mail::create($request->all());

            DB::commit();

            return response()->json(['message' => 'email cadastrado com sucesso'], Response::HTTP_OK);
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
