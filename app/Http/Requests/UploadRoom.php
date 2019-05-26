<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRoom extends FormRequest
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
        // Initial textual form input data rules
        $rules =  [
            'title'         => 'required|max:255',
            'description'   => 'required',
            'size'          => 'required|integer|max:5000',
            'price'         => 'required|integer|max:20000',
            'type'          => 'required|max:255',
            'zip_code'      => 'required|max:7',
            'number'        => 'required|max:10'
        ];

        // Create rules for each uploaded picture
        $number_of_pictures = count($this->pictures);

        foreach(range(0, $number_of_pictures) as $index) {
            $rules['pictures.' . $index] = 'image|mimes:jpg,jpeg,png,gif|max:4000';
        }

        return $rules;
    }
}
