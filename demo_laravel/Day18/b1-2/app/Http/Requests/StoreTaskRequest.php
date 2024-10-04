<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'completed' => 'required',
        ];
    }

    public function message(){
        return[
            'title.required'=>'Nhập tiêu đề',
            'title.string'=>'Phải là chuỗi ký tự',
            'title.max'=>'Tối đa 255 ký tự',
            'description.string'=>'Phải là chuỗi ký tự',
            'description.max'=>'Tối đa 255 ký tự',
            'completed.required'=>'Vui lòng chọn',
        ];
    }
}
