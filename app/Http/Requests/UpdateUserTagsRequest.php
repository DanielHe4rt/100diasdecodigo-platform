<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTagsRequest extends FormRequest
{
    public function authenticate(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'exists:tags,id']
        ];
    }
}
