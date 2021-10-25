<?php

namespace App\Repositories\Mail;

use App\Models\Mail\Mail;
use App\Repositories\BaseRepository;

/**
 * @property Mail $model
 * @method Mail getModel()
 */
class MailRepository extends BaseRepository implements MailInterface
{
    protected $modelClass = Mail::class;
}
