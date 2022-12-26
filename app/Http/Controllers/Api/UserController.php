<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClient;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {}

    public function index()
    {
        $listClients = $this->service->getListClients();
        return UserResource::collection($listClients);
    }

    public function store(StoreClient $request)
    {
        $newClients = $this->service
                            ->createClients($request->validated());
        
        return new UserResource($newClients);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($user)
    {
        $this->service->deleteClient($user);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
