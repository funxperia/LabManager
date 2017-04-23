<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EditSelfInformationRequest extends FormRequest
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
        return [
            'autograph' => 'required',
            'description' => 'required',
            'IDnumber' => 'required|size:18',
            'qq' => 'required|numeric',
            'phone' => array('required','regex:/^1(3|4|5|7|8)[0-9]\d{8}$/'),
            'nation' => 'required',
            'college' => 'required',
            'major' => 'required',
            'class' => 'required',
            'enrollment' => 'required|digits:4'
        ];
    }

    public function messages(){
        return [
            'autograph.required' => '个性签名不可为空！',
            'description.required' => '自我介绍不可为空！',
            'IDnumber.required' => '身份证号不可为空！',
            'IDnumber.size' => '身份证号为18位！',
            'qq.required' => 'QQ号不可为空！',
            'qq.numeric' => 'QQ号为数字！',
            'phone.required' => '手机号不可为空！',
            'phone.regex' => '请输入正确手机号！',
            'nation.required' => '民族不可为空！',
            'college.required' => '学院不可为空！',
            'major.required' => '专业不可为空！',
            'class.required' => '班级不可为空！',
            'enrollment.required' => '入学时间不可为空！',
            'enrollment.digits' => '入学时间为四位数字年份！',
        ];
    }
}
