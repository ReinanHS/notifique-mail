<?php

namespace App\Models\Mail;

use Database\Factories\Mail\MailTypeFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Mail\MailType.
 *
 * @property int $id
 * @property string $title
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Mail[] $mails
 * @property-read int|null $mails_count
 * @method static MailTypeFactory factory(...$parameters)
 * @method static Builder|MailType newModelQuery()
 * @method static Builder|MailType newQuery()
 * @method static \Illuminate\Database\Query\Builder|MailType onlyTrashed()
 * @method static Builder|MailType query()
 * @method static Builder|MailType whereCreatedAt($value)
 * @method static Builder|MailType whereDeletedAt($value)
 * @method static Builder|MailType whereId($value)
 * @method static Builder|MailType whereTitle($value)
 * @method static Builder|MailType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|MailType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|MailType withoutTrashed()
 * @mixin \Eloquent
 */
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
