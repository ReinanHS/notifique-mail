<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();

            $table->string('mail_from');
            $table->foreign('mail_from')->references('email')->on('users');

            $table->string('mail_to');
            $table->foreign('mail_to')->references('email')->on('users');

            $table->string('subject');
            $table->text('content');

            $table->unsignedBigInteger('mail_type_id');
            $table->foreign('mail_type_id')->references('id')->on('mail_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
