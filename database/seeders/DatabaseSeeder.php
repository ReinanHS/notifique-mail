<?php

namespace Database\Seeders;

use App\Models\Mail\Mail;
use App\Models\Mail\MailAttachment;
use App\Models\Mail\MailType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(10)->create();
        MailType::factory(5)->create();
//        Mail::factory(60)->create();
//        MailAttachment::factory(40)->create();
    }
}
