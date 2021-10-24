<?php

namespace App\Http\Controllers\Web\Mailbox;

use App\Helper\MailRenderHelper;
use App\Http\Controllers\Controller;
use App\Models\Mail\Mail;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;
use Inertia\Response;

class MailboxController extends Controller
{
    /**
     * Método para exibir a página da caixa de email.
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Mailbox/Index');
    }

    /**
     * Método para exibir o iframe com o conteúdo do endereço eletrônico.
     * @param Mail $mail
     * @return \Illuminate\Contracts\View\View
     */
    public function renderMailContent(Mail $mail): \Illuminate\Contracts\View\View
    {
        $content = MailRenderHelper::make($mail->content)
            ->removeTags('script')
            ->removeTags('video')
            ->removeTags('form')
            ->getHtml();

        return View::make('Mail.mail_iframe')->with('content', $content);
    }
}
