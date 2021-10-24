<?php

namespace App\Models\Mail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mail extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Método para estabelecer um relacionamento com a model de MailAttachment.
     * @return HasMany
     */
    public function attachments(): HasMany
    {
        return $this->hasMany(MailAttachment::class);
    }

    /**
     * Método para estabelecer um relacionamento com a model de MailType.
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(MailType::class)->withTrashed();
    }
}
