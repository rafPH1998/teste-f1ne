<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(
        protected User $user
    ) {}

    public function getListClients()
    {
        return $this->user
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->each(function (User $user) {
                        $user->cellphone = $this->format_phone($user->cellphone);
                        $user->phone     = $this->format_phone($user->phone);
                    });
 
    }

    public function getClient($user)
    {
        return $this->user->findOrFail($user->id);
    }

    public function createClients($data): object
    {
        return $this->user->create($data);
    }

    public function updateClients($data, $user): bool
    {
        $user = $this->user->findOrFail($user);
        return $user->update($data);
    }


    public function deleteClient(int $user): bool
    {
        $user = $this->user->findOrFail($user);
        return $user->delete();
    }

    public function format_phone(string|null $phone): string 
    {
        if (blank($phone)) {
            return 'Nenhum número cadastrado';
        }

        $ac     = substr($phone, 0, 2);
        $prefix = substr($phone, 3, 4);
        $suffix = substr($phone, 6);
    
        return "({$ac}) {$prefix}-{$suffix}";
    }
}