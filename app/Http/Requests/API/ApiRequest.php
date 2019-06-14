<?php
namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest {

  protected function failedValidation(Validator $validator)
  {
      $error = $validator->errors()->first();
      $response = ApiResponse::error($error);
      throw new ValidationException($validator, $response);
  }

}
