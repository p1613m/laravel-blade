<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'comment' => 'required|max:1000',
        ];

        if(!Auth::user()) {
            $rules['name'] = 'required|max:30';
        }

        return $rules;
    }
}
