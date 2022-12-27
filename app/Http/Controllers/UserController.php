<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClient;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {}
    
    public function index()
    {
        $listClients = $this->service->getListClients();
        return view('index', compact('listClients'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreClient $request)
    {
        $this->service
            ->createClients($request->validated());
            
        return redirect()
            ->route('users.create')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function show(User $user)
    {
        $listClient = $this->service
                    ->getClient($user);
        return view('show', compact('listClient'));
    }

    public function update(StoreClient $request, $user)
    {
        $this->service
            ->updateClients(
                $request->validated(),
                $user
            );
            
        return redirect()
            ->route('users.show', $user)
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($user)
    {
        $this->service->deleteClient($user);
        return redirect()
            ->route('users.index')
            ->with('success', 'Cliente deletado com sucesso!');
    }

    
}
