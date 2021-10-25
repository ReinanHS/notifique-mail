<?php

namespace Database\Factories\Mail;

use App\Models\Mail\MailType;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
        ];
    }
}
