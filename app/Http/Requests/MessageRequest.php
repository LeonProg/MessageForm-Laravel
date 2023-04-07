<?php

namespace App\Http\Requests;

use App\Rules\BlockType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'theme' => ['required', 'min:2', 'max:50'],
            'text' => ['required', 'min:20', 'max:255'],
            'file' => ['required', new BlockType,'max:3072'],
        ];
    }
}
