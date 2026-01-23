<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_title' => 'required|max:60',
            'category_id' => 'required',
            'rating'       => 'nullable|numeric|min:1|max:5',
            'price'        => 'nullable|numeric|min:0',
            'image'        => 'nullable',
        ];
    }
}
