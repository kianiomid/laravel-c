<?php

namespace App\Http\Requests\V1\Customer;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property int $customer
 * @property string $name
 * @property string $guard_name
 */
class CustomerSaveRequest extends FormRequest
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

    #[ArrayShape(['first_name' => "string[]", 'last_name' => "string[]", 'date_of_birth' => "string[]", 'phone_number' => "string[]", 'email' => "string[]", 'bank_account_number' => "string[]"])] public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'date_of_birth' => ['required', 'boolean'],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'string'],
            'bank_account_number' => ['required', 'string'],
        ];
    }
}
