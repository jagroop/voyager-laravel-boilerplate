<?php

namespace App\Repositories;

use App\User;

class UserRepository extends BaseRepository
{
     protected $model;
      /**
           * UserRepository constructor.
           * @param User $model
           */
        public function __construct(User $model)
        {
            $this->model=$model;
        }
}
