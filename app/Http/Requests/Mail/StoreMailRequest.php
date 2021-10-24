<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'mail_from' => ['required', 'email', 'exists:users,email'],
            'subject' => ['required', 'string', 'min:10', 'max:180'],
            'content' => ['required', 'string', 'min:10'],
            'mail_type_id' => ['required', 'int', 'exists:mail_types,id'],
            'mail_attachments' => ['nullable', 'array'],
            'mail_attachments.*' => ['file'],
        ];
    }
}
