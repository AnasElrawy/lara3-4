<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use App\Models\Posts;



class StorePostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'titel' => 'min:20',
            'description' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            
            'description.required' => 'you shoud enter description',
            
        ];
    }
}


// 'titel.required' => 'you shoud enter titel',
//             'titel.min:3' => 'minemum 3',
//             'titel.unique' => 'used titel',