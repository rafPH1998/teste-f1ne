<x-app>
    <div class="mx-auto overflow-hidden shadow-lg mb-2 bg-gray-900 border-4 rounded-lg md:w-3/6 sm:w-4/6 border-gray-400">
        @if (Session::has('success'))
            <x-alerts>
                {{Session::get('success')}}
            </x-alerts>
        @endif
        <h1 class="text-white ml-9 mt-7">Editar cliente: {{$listClient->name}}</h1>
        
        <form method="POST" class="px-10 py-10" action="{{route('users.update', $listClient->id)}}">
            <div class="flex flex-wrap">
                @method('PUT')
                @csrf
                <div class="w-full">
                    <label for="name" class="leading-7 text-sm text-white">Digite o nome
                    <input type="text" 
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white 
                        leading-tight focus:outline-none focus:shadow-outline" 
                        name="name" id="name"
                        value="{{$listClient->name}}">
                    @error('name')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="w-full">
                    <label for="email" class="leading-7 text-sm text-white">Digite o email
                    <input type="email" 
                        name="email" id="email" 
                        value="{{$listClient->email}}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white 
                        leading-tight focus:outline-none focus:shadow-outline">
                        @error('email')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror
                </div>

                <div class="w-full">
                    <label for="telephone" class="leading-7 text-sm text-white">Digite o Telefone (opcional)
                    <input type="text"
                        name="telephone" id="telephone" 
                        value="{{$listClient->telephone}}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white 
                            leading-tight focus:outline-none focus:shadow-outline">
                    @error('telephone')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
        
                <div class="w-full">
                    <label for="cellphone" class="leading-7 text-sm text-white">Digite o celular
                    <input type="text" 
                        value="{{$listClient->cellphone}}"
                        name="cellphone" id="cellphone" 
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white 
                        leading-tight focus:outline-none focus:shadow-outline">
                    @error('cellphone')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <button
                    class="mt-7 focus:outline-none text-white bg-green-700 
                    hover:bg-green-800 focus:ring-4 focus:ring-green-300 
                    font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 
                    dark:bg-green-600 dark:hover:bg-green-700 
                    dark:focus:ring-green-800">
                    Atualizar
                </button>

            </div>
            <a href="{{route('users.index')}}" class="ml-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Voltar</a>
        </form>
    </div>
</x-app>