<?php

namespace App\Services;

use App\Models\Address;
use App\Models\User;

class AddressService
{
    public function __construct(
        protected User $user,
        protected Address $address,
    ) {}
    
    public function createAddressToClient($data, $user)
    { 
        $this->address->create($data, $user);
    }

    public function getAddress($user)
    { 
        return $this->address
                    ->where('user_id', '=', $user)
                    ->with('user')
                    ->get();
    }

    public function deleteAddress($address)
    { 
        $address = $this->address->findOrFail($address);
        return $address->delete();
    }
    
    






}