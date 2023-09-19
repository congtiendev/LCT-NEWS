<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CommentRequest extends FormRequest
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
                    case 'store':
                        $rules = [
                            'content' => 'required|max:255',
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
            'content.required' => 'Vui lòng nhập nội dung bình luận',
            'content.max' => 'Nội dung bình luận quá dài',
        ];
    }
}
