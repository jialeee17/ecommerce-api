<?php

namespace App\Http\Requests;

use App\Enums\UserStatusesEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpsertCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            // Update Request (PUT / PATCH)
            $customer = $this->customer;

            $rules = [
                'username' => ['required', 'string', Rule::unique('customers', 'username')->ignore($customer)],
                'first_name' => ['required', 'string'],
                'last_name' => ['nullable', 'string'],
                'email' => ['required', 'email', Rule::unique('customers', 'email')->ignore($customer)],
                'password' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'address_1' => ['required', 'string'],
                'address_2' => ['nullable', 'string'],
                'city' => ['required', 'string'],
                'state' => ['required', 'string'],
                'postcode' => ['required', 'string'],
                'country_id' => ['required', 'exists:countries,id'],
                'status' => [Rule::enum(UserStatusesEnum::class)],
            ];
        } else {
            // Insert Request (POST)
            $rules = [
                'username' => ['required', 'string', 'unique:customers,username'],
                'first_name' => ['required', 'string'],
                'last_name' => ['nullable', 'string'],
                'email' => ['required', 'email', 'unique:customers,email'],
                'password' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'address_1' => ['required', 'string'],
                'address_2' => ['nullable', 'string'],
                'city' => ['required', 'string'],
                'state' => ['required', 'string'],
                'postcode' => ['required', 'string'],
                'country_id' => ['required', 'exists:countries,id'],
                'status' => ['nullable', Rule::enum(UserStatusesEnum::class)]
            ];
        }

        return $rules;
    }
}
