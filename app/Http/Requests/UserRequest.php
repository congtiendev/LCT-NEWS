<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    case 'createUser':
                        $rules = [
                            'fullname' => 'required|min:3|max:50',
                            'username' => 'required|min:3|max:20|unique:users',
                            'email' => 'required|email|unique:users',
                            'phone' => 'required|unique:users|max:11',
                            'password' => 'required|min:3|max:50',
                            'confirm_password' => 'required|same:password',
                        ];
                        break;
                    case 'updateAccount':
                        $rules = [
                            'fullname' => 'required|min:3|max:50',
                            'username' => 'required|min:3|max:20|unique:users,username,' . $this->id,
                            'email' => 'required|email|unique:users,email,' . $this->id,
                            'phone' => 'required|unique:users,phone,' . $this->id . '|max:11',
                        ];
                        break;
                    case 'updateProfile':
                        $rules = [
                            'fullname' => 'required|min:3|max:50',
                            'address' => 'required|min:10|max:100',
                            'birthday' => 'required|date|before:today',
                            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        ];
                        break;
                    case 'changePassword':
                        $rules = [
                            'password' => 'required',
                            'new_password' => 'required|min:3|max:50',
                            'confirm_password' => 'required|same:new_password',
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
            'fullname.required' => 'Họ tên không được để trống',
            'fullname.min' => 'Họ tên phải có ít nhất 3 ký tự',
            'fullname.max' => 'Họ tên không được vượt quá 50 ký tự',
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.min' => 'Tên đăng nhập phải có ít nhất 3 ký tự',
            'username.max' => 'Tên đăng nhập không được vượt quá 20 ký tự',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.max' => 'Số điện thoại không được vượt quá 11 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max' => 'Mật khẩu không được vượt quá 50 ký tự',
            'new_password.required' => 'Mật khẩu không được để trống',
            'new_password.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
            'new_password.max' => 'Mật khẩu không được vượt quá 50 ký tự',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu nhập lại không khớp',
            'address.required' => 'Địa chỉ không được để trống',
            'address.min' => 'Địa chỉ phải có ít nhất 10 ký tự',
            'address.max' => 'Địa chỉ không được vượt quá 100 ký tự',
            'birthday.required' => 'Ngày sinh không được để trống',
            'birthday.date' => 'Ngày sinh không đúng định dạng',
            'birthday.before' => 'Ngày sinh không được lớn hơn ngày hiện tại',
            'avatar.image' => 'Vui lòng chọn ảnh',
            'avatar.mimes' => 'Ảnh đại diện không đúng định dạng',
            'avatar.max' => 'Ảnh đại diện không được vượt quá 2MB',
        ];
    }
}