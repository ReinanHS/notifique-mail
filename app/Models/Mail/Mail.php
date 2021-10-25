<?php

namespace App\Models\Mail;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Mail\Mail.
 *
 * @property int $id
 * @property string $mail_from
 * @property string $mail_to
 * @property string $subject
 * @property string $content
 * @property int $mail_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|MailAttachment[] $attachments
 * @property-read int|null $attachments_count
 * @property-read MailType $type
 * @property-read User $userMailFrom
 * @property-read User $userMailTo
 * @method static \Database\Factories\Mail\MailFactory factory(...$parameters)
 * @method static Builder|Mail newModelQuery()
 * @method static Builder|Mail newQuery()
 * @method static Builder|Mail query()
 * @method static Builder|Mail whereContent($value)
 * @method static Builder|Mail whereCreatedAt($value)
 * @method static Builder|Mail whereId($value)
 * @method static Builder|Mail whereMailFrom($value)
 * @method static Builder|Mail whereMailTo($value)
 * @method static Builder|Mail whereMailTypeId($value)
 * @method static Builder|Mail whereSubject($value)
 * @method static Builder|Mail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo(MailType::class, 'mail_type_id')->withTrashed();
    }

    /**
     * Método para estabelecer um relacionamento com a model de User.
     * @return BelongsTo
     */
    public function userMailFrom(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mail_from', 'email');
    }

    /**
     * Método para estabelecer um relacionamento com a model de User.
     * @return BelongsTo
     */
    public function userMailTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mail_to', 'email');
    }
}
