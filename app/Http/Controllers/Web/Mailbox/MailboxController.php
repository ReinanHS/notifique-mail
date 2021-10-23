<?php

namespace App\Http\Controllers\Web\Mailbox;

use App\Http\Controllers\Controller;
use Inertia\Response;
use Inertia\Inertia;

class MailboxController extends Controller
{
    /**
     * Método para exibir a página da caixa de email
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Mailbox/Index');
    }
}
