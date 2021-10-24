<?php

namespace App\Http\Resources\Mail;

use App\Models\Mail\Mail;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Mail $resource
 */
class MailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable
     */
    public function toArray($request): array
    {
        return [
            'mail_box' => MailBoxResource::make($this->resource),
            'iframe_src' => route('dashboard.mailbox.iframe', $this->resource->id),
            'attachments' => MailAttachmentsResource::collection($this->resource->attachments),
        ];
    }
}
