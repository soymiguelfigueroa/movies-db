<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->is_admin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'year' => 'integer',
            'duration' => 'integer',
            'rating' => 'integer',
            'cover' => 'file',
            'trailer' => 'string',
            'synopsis' => 'string',
            'classification_id' => 'integer',
            'genre' => 'array',
        ];
    }
}
