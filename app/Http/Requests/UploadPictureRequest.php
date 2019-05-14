<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadPictureRequest extends FormRequest
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
        $rules =  [
            'name'  => 'required'
        ];

        $number_of_pictures = count($this->pictures);

        foreach(range(0, $number_of_pictures) as $index) {
            $rules['pictures.' . $index] = 'image';
        }
        return $rules;
    }
}
