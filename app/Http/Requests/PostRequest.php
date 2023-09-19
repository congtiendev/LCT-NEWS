<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PostRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [];
        $currenAction = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($currenAction) {
                    case 'createPost':
                        $rules = [
                            'title' => 'required|min:3|max:100',
                            'content' => 'required',
                            'category_id' => 'required',
                            'thumbnail' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
                            'description' => 'required|min:10',
                        ];
                        break;
                    case 'updatePost':
                        $rules = [
                            'title' => 'required|min:3|max:100',
                            'content' => 'required',
                            'category_id' => 'required',
                            'thumbnail' => 'mimes:jpeg,png,jpg,gif,svg|max:5048',
                            'description' => 'required|min:10|max:255',
                        ];
                        break;
                    default:
                        break;
                }
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'title.min' => 'Tiêu đề phải có ít nhất 3 ký tự',
            'title.max' => 'Tiêu đề không được vượt quá 100 ký tự',
            'content.required' => 'Nội dung bài viết không được để trống',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'thumbnail.required' => 'Ảnh đại diện không được để trống',
            'thumbnail.image' => 'Ảnh không đúng định dạng',
            'thumbnail.mimes' => 'Ảnh không đúng định dạng',
            'thumbnail.max' => 'Ảnh không được vượt quá 2MB',
            'description.required' => 'Mô tả không được để trống',
            'description.min' => 'Mô tả phải có ít nhất 10 ký tự',
        ];
    }
}
