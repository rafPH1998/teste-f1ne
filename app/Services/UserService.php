<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(
        protected User $user
    ) {}

    public function getListClients(): object
    {
        return $this->user
                    ->orderBy('id', 'DESC')
                    ->get();
    }

    public function createClients($data): object
    {
        return $this->user->create($data);
    }

    public function deleteClient(int $user)
    {
        $user = $this->user->findOrFail($user);
        return $user->delete();
    }
}