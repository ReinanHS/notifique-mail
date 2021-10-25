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
     * Método para enviar um SMS
     * @param Mail $mail
     * @throws ConfigurationException
     * @throws TwilioException
     */
    private function sendSMS(Mail $mail): void
    {
        $client = new Client(env('TWILIOO_ACCOUNT_SID'), env('TWILIOO_AUTH_TOKEN'));
        $client->messages->create('+5579996486832',[
            'from' => env('TWILIOO_PHONE_NUMBER'),
            'body' => 'Olá '.$mail->userMailTo->name . ', você acabou de receber uma mensagem de '. $mail->userMailFrom->name . '. Para mais informações acesse o site https://mail.reinanhs.com/',
        ]);
    }
}
