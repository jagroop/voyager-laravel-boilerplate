<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Helpers\ApiResponse;
use DB;
use App\User;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserprofileResource;
use App\Job;


class UserController extends AppBaseController {
 
 public function updateDeviceToken(Request $request)
 {
   $user = auth()->user();
   $user->device_token = $request->input('device_token');
   $user->device_type = $request->input('device_type');
   $user->save();
   return $this->sendResponse($user->toArray(), 'success');
 }

 public function updateCoordinates(Request $request)
 {
   $user = auth()->user();
   $user->latitude = $request->input('latitude');
   $user->longitude = $request->input('longitude');
   // $user->user_tz = $request->input('user_tz');
   $user->save();
   return $this->sendResponse($user->toArray(), 'success');
 }

 public function cards(Request $request)
 {
     $user = $request->user();
     
     $stripe_id = $user->stripe_id;
     
     if(!$stripe_id)
     {
       return ApiResponse::success('success', []);
     }

     $parameters = ['limit' => 24];

     $cards = $user->asStripeCustomer()->sources->all(
            ['object' => 'card'] + $parameters
     );

     $list = $cards->data;

     return ApiResponse::success('success', $list);
 }

 public function addCard(Request $request)
 {
      $user = $request->user();

      $validator = Validator::make($request->all(), [
          'token' => 'required|string'
      ]); 

      if ($validator->fails()) {
          $error = $validator->messages()->first();
          return ApiResponse::error($error);
      } 

      $token = $request->input('token');
      $user->updateCard($token);
      $card = $user->defaultCard();
      return ApiResponse::success('success', $card);
 }

}
