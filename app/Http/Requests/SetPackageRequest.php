<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetPackageRequest extends FormRequest
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
            'package_id' => "required|integer|min:1",
            'company_id' => "required|integer|min:1",
        ];
    }
}
