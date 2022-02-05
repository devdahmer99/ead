<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed $validated
 */
class StoreSupport extends FormRequest
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
     * @param Support $support
     * @return array
     */
    #[ArrayShape(['lesson' => "string[]", 'status' => "array"])]
    public function rules(Support $support): array
    {
        return [
            'lesson' => ['required', 'exists:lesson,id'],
            'status' => ['required', Rule::in([array_keys($support->statusOptions)])],
            'description' => ['required', 'min:3', 'max:10000'],
        ];
    }
}
