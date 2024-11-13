<?php

namespace App\Http\Requests;

use App\Traits\CustomValidationMessageTrait;
use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    use CustomValidationMessageTrait;
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
        if (isset($this->company)) {
            return [
                'company_name' => 'required|unique:company,company_name,' . $this->company . ',company_id',
            ];
        }
        return [
            'company_name' => 'required|unique:company',
        ];
    }
}
