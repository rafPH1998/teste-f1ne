<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(
        protected User $model
    ) {}

    public function getListUsers(): object
    {
        return $this->model
                    ->with('phones')
                    ->get();
    }
}