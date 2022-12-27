<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddress;
use App\Models\Address;
use App\Models\User;
use App\Services\UserService;
use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function __construct(
        protected UserService $service,
        protected AddressService $addressService,
    ) {}
    
    public function index(User $user)
    {
        return view('address', [
            'user' => $this->service->getClient($user)
        ]);
    }

    public function store(StoreAddress $request, $user)
    {
        $data = $request->validated();
        $data['user_id'] = $user;

        $this->addressService->createAddressToClient($data, $user);

        return redirect()
                ->route('users.address', $user)
                ->with('success', 'Endereço cadastrado com sucesso!');
    }

    public function details($user)
    {   
        return view('details',[
            'details' => $this->addressService->getAddress($user)
        ]);
    }

    public function destroy($address)
    {   
        $this->addressService->deleteAddress($address);
        return redirect()
            ->route('users.index')
            ->with('success', 'Cliente deletado com sucesso!');
    }
    
}
