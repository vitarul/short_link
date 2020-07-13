<?php

namespace App\Http\Requests;

use App\Rules\UniqueLinkCode;
use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'link' => ['required', 'string', 'url', 'max:255'],
            'code' => ['string', 'max:32', 'nullable', app(UniqueLinkCode::class)],
            'expired_at' => ['int', 'max:30', 'min:1'],
            'is_commercial' => ['string', 'max:2', 'nullable'],
        ];
    }

    public function getData(): array
    {
        return $this->all(array_keys($this->rules()));
    }
}
