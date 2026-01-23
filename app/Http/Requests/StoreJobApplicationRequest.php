<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // PUBLIC
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['nullable', 'string','max:255'],
            'phone' => 'required|string|max:20',
            'apply_for' => 'required|string|max:255',
            'cv' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];

         if (app()->environment(config("app.live_env"))) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        return $rules;
    }
}
