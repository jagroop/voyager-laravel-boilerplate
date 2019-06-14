<?php

namespace App\Http\Requests\API;

class RegisterRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
            'avatar'    => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'device_type'  => 'string',
            'device_token' => 'string',
            'latitude'     => 'string',
            'longitude'    => 'string',
        ];
    }
}
