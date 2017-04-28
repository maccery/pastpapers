<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSuggestDateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'past_paper_id' => 'required|exists:past_papers,id',
            'release_date' => 'required|unique:suggested_release_dates|date',
        ];
    }
}
