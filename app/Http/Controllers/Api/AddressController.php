<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddress;
use App\Http\Resources\AddressResource;
use App\Services\AddressService;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    public function __construct(
        protected UserService $service,
        protected AddressService $addressService,
    ) {}
    
    public function index($user)
    {
        $address =  $this->addressService->getAddress($user);
        return AddressResource::collection($address);
    }

    public function store(StoreAddress $request, $user)
    {
        $data = $request->validated();
        $data['user_id'] = $user;

        $newAddress = $this->addressService
                            ->createAddressToClient($data, $user);
        
        return new AddressResource($newAddress);
    }

    public function destroy($address)
    {
        $this->addressService->deleteAddress($address);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }


}
