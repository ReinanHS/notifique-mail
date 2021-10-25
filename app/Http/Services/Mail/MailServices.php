<?php

namespace App\Http\Services\Mail;

use App\Helper\MailRenderHelper;
use App\Repositories\Mail\MailInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class MailServices
{
    /**
     * @var MailInterface
     */
    protected $repository;

    /**
     * @param MailInterface $repository
     */
    public function __construct(MailInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Método para cadastrar um email.
     * @param array $data
     * @return JsonResponse
     * @throws Throwable
     */
    public function create(array $data): JsonResponse
    {
        try {
            DB::beginTransaction();

            $data['content'] = MailRenderHelper::make($data['content'])
                ->removeTags('script')
                ->removeTags('video')
                ->removeTags('form')
                ->getHtml();

            if (is_null($this->repository->create($data))) {
                throw new Exception('Não foi possível criar o registro');
            }

            DB::commit();

            return response()->json(['message' => 'email cadastrado com sucesso'], Response::HTTP_OK);
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
