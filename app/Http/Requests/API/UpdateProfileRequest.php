<?php

namespace App\Http\Requests\API;

class UpdateProfileRequest extends ApiRequest
{
    public function rules()
    {
        return [
          'name'   => 'required|string|max:255',
          'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
