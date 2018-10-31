<?php

namespace App\Http\Requests\SocialProfile;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialProfile extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => 'integer',
            'company_social_profile_account_name' => 'nullable|string|max:255',
            'company_social_profile_account_url' => 'nullable|string|max:255',
            'company_social_profile_account_username' => 'nullable|string|max:255',
            'company_social_profile_account_password' => 'nullable|string|max:255',
        ];
    }
}