<?php

namespace App\Models\Mail;

use Database\Factories\Mail\MailAttachmentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Mail\MailAttachment.
 *
 * @property int $id
 * @property int $mail_id
 * @property string $file_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Mail $mail
 * @method static MailAttachmentFactory factory(...$parameters)
 * @method static Builder|MailAttachment newModelQuery()
 * @method static Builder|MailAttachment newQuery()
 * @method static Builder|MailAttachment query()
 * @method static Builder|MailAttachment whereCreatedAt($value)
 * @method static Builder|MailAttachment whereFilePath($value)
 * @method static Builder|MailAttachment whereId($value)
 * @method static Builder|MailAttachment whereMailId($value)
 * @method static Builder|MailAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
