<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'job_title_id' => 'required|exists:crm_job_titles,id',
            'image' => 'nullable|image'
        ];
    }
}
