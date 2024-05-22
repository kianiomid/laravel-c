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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_birth' => 'required|string',
            'phone_number' => 'required|numeric|unique:customers|regex:/^([+]?[0-9]{1,3})?([-\.\s])?([0-9]{3})([-\.\s])?([0-9]{4,})$/',
            'email' => 'required|email|unique:customers',
            'bank_account_number' => 'required|digits:24', //TODO: use popular package or use regex
        ];
    }
}
