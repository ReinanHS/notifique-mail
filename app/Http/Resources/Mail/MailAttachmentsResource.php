<?php

namespace App\Http\Resources\Mail;

use App\Models\Mail\MailAttachment;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read MailAttachment $resource
 */
class MailAttachmentsResource extends JsonResource
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
            'file_path' => $this->resource->file_path,
        ];
    }
}
