<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInternshipApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules =  [
            'name' => 'required|string|max:255',
            'email' => 'nullable|string',
            'phone' => 'required|string|max:20',
            'internship_id' => 'required|exists:internships,id',
        ];

        if (app()->environment(config("app.live_env"))) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        return $rules;
    }
}
