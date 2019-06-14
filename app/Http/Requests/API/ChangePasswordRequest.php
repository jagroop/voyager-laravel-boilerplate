<?php

namespace App\Http\Requests\API;

class ChangePasswordRequest extends ApiRequest
{
    public function rules()
    {
        return [
          'oldpassword'  => 'required',
          'newpassword'  => 'required|string|min:6'
        ];
    }
}
