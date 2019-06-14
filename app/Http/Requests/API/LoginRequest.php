<?php

namespace App\Http\Requests\API;

class LoginRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'email'        => 'required|email',
            'password'     => 'required',
            'device_type'  => 'string',
            'device_token' => 'string',
            'latitude'     => 'string',
            'longitude'    => 'string',
        ];
    }
}
