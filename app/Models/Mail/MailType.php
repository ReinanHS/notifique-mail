<?php

namespace App\Models\Mail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title'];

    /**
     * Método para estabelecer um relacionamento com a model de Mail.
     * @return HasMany
     */
    public function mails(): HasMany
    {
        return $this->hasMany(Mail::class);
    }
}
