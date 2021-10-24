<?php

namespace App\Models\Mail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MailAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['file_path'];

    /**
     * Método para estabelecer um relacionamento com a model de Mail.
     * @return BelongsTo
     */
    public function mail(): BelongsTo
    {
        return $this->belongsTo(Mail::class);
    }
}
