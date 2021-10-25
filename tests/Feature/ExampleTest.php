<?php

namespace Tests\Feature;

use App\Http\Services\Mail\MailServices;
use App\Models\Mail\Mail;
use App\Models\Mail\MailType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_mail()
    {
        $subject = 'Teste ' . md5(time());

        $result = Mail::withoutEvents(function () use ($subject){
            /**
             * @var MailType $mailType
             */
            $mailType = MailType::factory()->create();

            /**
             * @var User $userFrom
             */
            $userFrom = User::factory()->create();

            /**
             * @var User $userTo
             */
            $userTo = User::factory()->create();

            /**
             * @var MailServices $service
             */
            $service = App::make(MailServices::class);

            return $service->create([
                'mail_from' => $userFrom->email,
                'mail_to' => $userTo->email,
                'subject' => $subject,
                'content' => 'Olá mundo!',
                'mail_type_id' => $mailType->id,
            ]);
        });

        /**
         * @var Mail $lastMail
         */
        $lastMail = Mail::orderByDesc('content')->first();

        $this->assertEquals($lastMail->subject, $subject);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_access_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
