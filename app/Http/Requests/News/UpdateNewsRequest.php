<?php

namespace App\Http\Requests\News;

use App\Enums\Source;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can('news.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'bail|required|min:3|max:255',
            'content'=>'bail|required|min:3|max:255',
            'category'=>'bail|required|min:3|max:255',
            'resource'=>['bail', 'required', Rule::enum(Source::class)],
        ];
    }
}
