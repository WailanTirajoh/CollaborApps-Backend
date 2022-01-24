<?php

namespace App\Http\Requests;

use App\Models\React;
use Illuminate\Foundation\Http\FormRequest;

class StoreReactRequest extends FormRequest
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
        $the_react_id = '';
        foreach (React::pluck('id') as $react_id) {
            $the_react_id .= $react_id . ',';
        }
        return [
            'react_id' => [
                'required',
                'in:' . $the_react_id
            ]
        ];
    }
}
