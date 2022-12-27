<x-app>
    <div class="mx-auto overflow-hidden shadow-lg mb-2 bg-gray-900 border-4 rounded-lg md:w-3/6 sm:w-4/6 border-gray-400">
        @if (Session::has('success'))
            <x-alerts>
                {{Session::get('success')}}
            </x-alerts>
        @endif
        <h1 class="text-white ml-9 mt-7">Adicionar um endereço para usuario: {{$user->name}}</h1>
        <form method="POST" class="px-10 py-10" action="{{route('users.address.store', $user->id)}}">
            <div class="flex flex-wrap">
                @csrf
                <div class="w-full">
                    <label for="street" class="leading-7 text-sm text-white">Rua
                    <input type="text" 
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white 
                        leading-tight focus:outline-none focus:shadow-outline" 
                        name="street" id="street"
                        value="{{old('street')}}">
                    @error('street')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="w-full">
                    <label for="district" class="leading-7 text-sm text-white">Bairro
                    <input type="text" 
                        name="district" id="district" 
                        value="{{old('district')}}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white 
                        leading-tight focus:outline-none focus:shadow-outline">
                        @error('district')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror
                </div>

                <div class="w-full">
                    <label for="number" class="leading-7 text-sm text-white">Número da casa
                    <input type="text"
                        name="number" id="number" 
                        value="{{old('number')}}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white 
                            leading-tight focus:outline-none focus:shadow-outline">
                    @error('number')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <button
                    class="mt-7 focus:outline-none text-white bg-green-700 
                    hover:bg-green-800 focus:ring-4 focus:ring-green-300 
                    font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 
                    dark:bg-green-600 dark:hover:bg-green-700 
                    dark:focus:ring-green-800">
                    Adicionar
                </button>

            </div>
            <a href="{{route('users.index')}}" class="ml-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Voltar</a>
        </form>
    </div>

</x-app>