<x-app>
    <a href="{{route('users.index')}}" class="ml-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Voltar</a>

    <h1 class="mt-7 text-white">Lista de endereços cadastrados</h1>

    @forelse ($details as $detail)
        <div class="w-2/3 flex bg-gray-900 shadow-md rounded p-4 mt-10 shadow-2xl">
            <div class="pl-3 text-center">
                <div class="pl-3 text-center">
                    <div class="flex">
                        <div class="flex">
                            <p class="text-white">- Cliente:</p>
                            <p class="text-gray-500 ml-5">{{$detail->user->name}}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex">
                            <p class="text-white">- Rua:</p>
                            <p class="text-gray-500 ml-5">{{$detail->street}}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex">
                            <p class="text-white">- Bairro:</p>
                            <p class="text-gray-500 ml-5">{{$detail->district}}</p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex">
                            <p class="text-white">- Número:</p>
                            <p class="text-gray-500 ml-5">{{$detail->number}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('users.address.destroy', $detail->id)}}" method="POST">
            @method('DELETE')
            @csrf                                 
            <button 
                class="text-red-500" 
                onclick="return confirm('Tem certeza que deseja excluir esse endereço?')">
                excluír endereço
            </button>
        </form>
    @empty
        <div class="w-full shadow-2xl sm:rounded-lg mt-3 text-white bg-gray-900">
            <p class="px-8 py-8">
                Nenhuma endereço cadastrado para esse cliente!
            </p>
        </div>
    @endforelse
</x-app>