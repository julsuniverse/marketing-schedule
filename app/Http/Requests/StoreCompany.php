<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'company_phone' => 'nullable|string|max:255',
            'company_email' => 'nullable|string|max:255|email',
            'company_google_email' => 'nullable|string|max:255|email',
            'company_google_password' => 'nullable|string|max:255',
            'company_ip_address' => 'nullable|string|max:255',
            'company_notes' => 'nullable|string',
            'company_client_name' => 'nullable|string|max:255',
            'company_client_phone' => 'nullable|string|max:255',
            'marketing' => 'boolean',
            'smtp_host' => 'required|string|max:255',
            'smtp_user' => 'required|string|max:255',
            'smtp_password' => 'required|string|max:255',
            'smtp_port' => 'required|integer',
            'smtp_secure' => 'required|string|max:3',
            'levels_id' => 'required|integer'
        ];
    }
}
