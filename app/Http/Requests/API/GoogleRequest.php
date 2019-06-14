<?php

namespace App\Http\Requests\API;

class GoogleRequest extends ApiRequest
{
    public function rules()
    {
        return [
          'name'      => 'required|string|max:255',
          'email'     => 'required|string|email',
          'google_id' => 'required|string',
          'device_type'  => 'string',
          'device_token' => 'string',
          'latitude'     => 'string',
          'longitude'    => 'string',
        ];
    }
}
