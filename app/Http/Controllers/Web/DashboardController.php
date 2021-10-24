<?php

namespace App\Http\Controllers\Web;

use Inertia\Inertia;
use Inertia\Response;

class DashboardController
{
    /**
     * Método para exibir a página inicial da dashboard.
     * @return Response
     */
    public function __invoke(): Response
    {
        return Inertia::render('Dashboard');
    }
}
