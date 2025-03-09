<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|unique:users|max:191',
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',
            'password' => 'required|string|min:6',
            're-password' => 'required|string|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập vào email',
            'email.email' => 'Bạn nhập sai định dạng email. Ví dụ: abc@gmail.com',
            'email.unique' => 'Email đã tồn tại. Hãy chọn email khác',
            'email.string' => 'Email phải là dạng ký tự',
            'email.max' => 'Độ dài email tối đa là 191 ký tự',
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.string' => 'Họ tên phải là dạng ký tự',
            'user_catalogue_id.required' => 'Bạn chưa chọn nhóm thành viên',
            'password.required' => 'Bạn chưa nhập vào mật khẩu',
            'password.min' => 'Mật khẩu không được ít hơn 6 ký tự',
            're-password.same' => 'Mật khẩu không khớp',
            're-password.required' => 'Nhập lại mật khẩu không được để trống',
        ];
    }
}
