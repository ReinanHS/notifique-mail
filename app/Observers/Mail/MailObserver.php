<?php

namespace App\Observers\Mail;

use App\Mail\SendMailContent;
use App\Models\Mail\Mail;
use Illuminate\Support\Facades\Mail as MailFacade;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class MailObserver
{
    /**
     * @param Mail $mail
     * @throws ConfigurationException
     * @throws TwilioException
     */
    public function created(Mail $mail): void
    {
        MailFacade::to($mail->userMailTo)->send(new SendMailContent($mail));
        $this->sendSMS($mail);
    }

    /**
     * Método para enviar um SMS.
     * @param Mail $mail
     */
    private function sendSMS(Mail $mail): void
    {
        try {
            $client = new Client(env('TWILIOO_ACCOUNT_SID'), env('TWILIOO_AUTH_TOKEN'));
            $client->messages->create($mail->userMailFrom->phone_number, [
                'from' => env('TWILIOO_PHONE_NUMBER'),
                'body' => 'Olá ' . $mail->userMailTo->name . ', você acabou de receber uma mensagem de ' . $mail->userMailFrom->name . '. Para mais informações acesse o site https://mail.reinanhs.com/',
            ]);
        } catch (\Exception $exception) {
            // TODO: Realizar implementação para tratamentos de erros
        }
    }
}
