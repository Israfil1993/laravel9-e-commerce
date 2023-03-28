<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
           // 'id'=>'nullable',
            'keywords'=>'nullable',
            'description'=>'nullable',
            'company'=>'nullable',
            'address'=>'nullable',
            'phone'=>'nullable',
            'fax'=>'nullable',
            'email'=>'nullable',
            'smtpserver'=>'nullable',
            'smtpemail'=>'nullable',
            'smtppassword'=>'nullable',
            'smtpport'=>'nullable',
            'facebook'=>'nullable',
            'instagram'=>'nullable',
            'twitter'=>'nullable',
            'aboutus'=>'nullable',
            'contact'=>'nullable',
            'references'=>'nullable',
        ];
    }
}
