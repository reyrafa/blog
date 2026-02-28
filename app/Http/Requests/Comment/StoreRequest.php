<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post_id' => [
                'required',
                'integer',
                'exists:posts,id',
            ],
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],
            'comment' => [
                'required',
                'string',
                'max:1000'
            ]
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'post_id' => $this->post->id,
            'user_id' => auth()->user()->id
        ]);
    }
}
