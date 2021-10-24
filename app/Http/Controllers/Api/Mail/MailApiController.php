<?php

namespace App\Http\Controllers\Api\Mail;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailResource;
use App\Models\Mail\Mail;

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
}
