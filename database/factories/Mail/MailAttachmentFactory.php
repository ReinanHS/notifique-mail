<?php

namespace Database\Factories\Mail;

use App\Models\Mail\Mail;
use App\Models\Mail\MailAttachment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailAttachmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailAttachment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mail_id' => Mail::all()->random()->id,
            'file_path' => $this->faker->md5() . '.' . $this->faker->fileExtension(),
        ];
    }
}
