<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Voyager;

class UserResource extends JsonResource
{

    private $token;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $token = '')
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;        
        $this->token = $token;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
          'id'                 => $this->id,
          'name'               => (string) $this->name,
          'email'              => (string) $this->email,
          // 'role'               => (string) $this->role,
          'avatar'             => (string) Voyager::image($this->avatar),
          'created_at'         => (string) $this->created_at,
          'token'              => $this->when($this->token != '', $this->token),
        ];
    }
}
