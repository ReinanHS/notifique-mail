<?php

namespace App\Http\Resources\Mail;

use App\Http\Resources\User\UserResource;
use App\Models\Mail\Mail;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Mail $resource
 */
class MailBoxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'is_read' => false, // TODO: O valor está fixo para realizar testes
            'user_mail_from' => UserResource::make($this->resource->userMailFrom),
            'user_mail_to' => UserResource::make($this->resource->userMailTo),
            'subject' => $this->resource->subject,
            'mail_type' => $this->resource->type->title,
            'created_at' => $this->resource->created_at,
        ];
    }
}
