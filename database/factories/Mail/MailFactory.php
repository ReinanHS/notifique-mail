<?php

namespace Database\Factories\Mail;

use App\Models\Mail\Mail;
use App\Models\Mail\MailType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_from' => User::all()->random()->email,
            'mail_to' => User::all()->random()->email,
            'subject' => $this->faker->sentence,
            'content' => $this->faker->randomHtml(2, 2),
            'mail_type_id' => MailType::all()->random()->id,
        ];
    }
}
