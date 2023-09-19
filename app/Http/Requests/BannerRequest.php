<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
        $currenAction = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($currenAction) {
                    case 'createBanner':
                        $rules = [
                            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5048',
                            'slogan' => 'required|max:255',
                            'link' => 'required|url|max:255',
                        ];
                        break;
                    case 'updateBanner':
                        $rules = [
                            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:5048',
                            'slogan' => 'required|max:255',
                            'link' => 'required|url|max:255',
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
            'image.required' => 'Vui lòng chọn ảnh',
            'image.mimes' => 'Ảnh không đúng định dạng',
            'image.max' => 'Ảnh quá lớn',
            'slogan.required' => 'Vui lòng nhập slogan',
            'slogan.min' => 'Slogan quá ngắn',
            'slogan.max' => 'Slogan quá dài',
            'link.required' => 'Vui lòng nhập link',
            'link.url' => 'Link không đúng định dạng',
            'link.max' => 'Link quá dài',
        ];
    }
}
